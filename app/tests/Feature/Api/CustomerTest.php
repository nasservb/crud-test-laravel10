<?php

namespace Tests\Feature\Api;

use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\CustomerFactory;
use Database\Factories\UserFactory;
use App\Domains\Customer\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setup(): void
    {
        parent::setUp();
        $user = (new UserFactory())->create();
        $this->actingAs($user);
    }

    /**
     * @test
     * @dataProvider createValidationData
     */
    public function ItShouldBeAcceptValidDataForCreate($data, $responseCode)
    {
        $parameters =[
            'first_name' => $data[0],
            'last_name' => $data[1],
            'email' => $data[2],
            'phone_number' => $data[3],
            'bank_account_number' => $data[4],
            'date_of_birth' => $data[5],
        ];
        $response = $this->postJson(route('api.Customer.create'), $parameters);
        $response->assertStatus($responseCode);
    }

    /**
     * provide test data for create and edit validation
     *
     * @return array[]
     */
    public static function createValidationData(): array
    {
        //$faker = Container::getInstance()->make(Generator::class);

        return [
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43240000320000024','1999-11-05'],200],
            [['','','nasservb@gmail.com','','',''],200],
            [['nasser','niazy','nasservbgmail.com','+989189151266','43243224','1989'],422],
            [['nasser','niazy','nasservb@gmail','+989189151266','43243224','1989'],422],
            [['nasser','niazy','nasservb@.com','+989189151266','43243224','1989'],422],
            [['nasser','niazy','nasservb@gmail.com','+9891','43243224','1989'],422],
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43','1989'],422],
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43','1'],422],
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43','100000'],422],
            [['','','','','',''],422],
            [[Str::random(200),'','nasservb@gmail.com','','',''],422],
            [[null,null,null,null,null,null],422],
            ];
    }

    /**
     * @test
     */
    public function ItCanBeAddItemToDatabaseAfterCreate()
    {

        $data =$this->exampleCustomerData() ;

        $response = $this->postJson(route('api.Customer.create'), $data);
        $response->assertStatus(200);

        $this->assertDatabaseCount(Customer::class, 1);
    }

    /**
     * @test
     */
    public function ItCanShowAllItemWhenCallIndex()
    {
        (new CustomerFactory(100))->create();

        $response = $this->get(route('api.Customer.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'first_name',
                        'last_name',
                        'email',
                        'phone_number' ,
                        'bank_account_number',
                        'date_of_birth',
                    ]
                ],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next'
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'links',
                    'path',
                    'per_page',
                    'to',
                    'total',
                ]

        ]);

        $this->assertEquals(100, json_decode($response->getContent(), 1)['meta']['total']);
    }

    private function exampleCustomerData()
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'bank_account_number'=>fake()->iban(),
            'date_of_birth'=> fake()->dateTimeBetween('1990-01-01', '2012-12-31')
                ->format('Y-m-d'),
        ];
    }

    /**
     * @test
     */
    public function ItCanShowItemDataAfterShow()
    {
        $item = (new CustomerFactory())->create();

        $response = $this->get(route('api.Customer.show', $item->id));

        $response->assertStatus(200);
        $this->assertJson(json_encode([
            'id' => $item->id,
            'first_name' => $item->first_name,
            'last_name' => $item->last_name,
            'date_of_birth' => $item->date_of_birth,
            'phone_number' => $item->phone_number,
            'email' => $item->email,
            'bank_account_number' => $item->bank_account_number,
        ]), $response->getContent());

        $response = $this->get(route('api.Customer.show', $item->id + 1));

        $response->assertStatus(404);
    }

    /**
     * @test
     * @dataProvider editValidationData
     */
    public function ItShouldBeAcceptValidDataForEdit($data, $responseCode)
    {
        $parameters =[
            'first_name' => $data[0],
            'last_name' => $data[1],
            'email' => $data[2],
            'phone_number' => $data[3],
            'bank_account_number' => $data[4],
            'date_of_birth' => $data[5],
        ];
        $item = (new CustomerFactory())->create();
        $response = $this->put(route('api.Customer.edit', $item->id), $parameters);
        $response->assertStatus($responseCode);
    }

    /**
     * provide test data for create and edit validation
     *
     * @return array[]
     */
    public static function editValidationData(): array
    {
        //$faker = Container::getInstance()->make(Generator::class);

        return [
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43240000320000024','1999-11-05'],200],
            [['','','nasservb@gmail.com','','',''],200],
            [['nasser','niazy','nasservbgmail.com','+989189151266','43243224','1989'],302],
            [['nasser','niazy','nasservb@gmail','+989189151266','43243224','1989'],302],
            [['nasser','niazy','nasservb@.com','+989189151266','43243224','1989'],302],
            [['nasser','niazy','nasservb@gmail.com','+9891','43243224','1989'],302],
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43','1989'],302],
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43','1'],302],
            [['nasser','niazy','nasservb@gmail.com','+989189151266','43','100000'],302],
            [['','','','','',''],302],
            [[Str::random(200),'','nasservb@gmail.com','','',''],302],
            [[null,null,null,null,null,null],302],
        ];
    }

    /**
     * @test
     */
    public function ItCanBeEditItemAfterEdit()
    {
        $item = (new CustomerFactory())->create();

        $data = $this->exampleCustomerData();
        $data['id']=  $item->id;
        $response = $this->put(route('api.Customer.edit', $item->id), $data);

        $response->assertStatus(200);

        $item->refresh();

        $this->assertEquals($item->id, $data['id']);
        $this->assertEquals($item->first_name, $data['first_name']);
        $this->assertEquals($item->last_name, $data['last_name']);
        $this->assertEquals($item->date_of_birth, $data['date_of_birth']);
        $this->assertEquals($item->phone_number, $data['phone_number']);
        $this->assertEquals($item->email, $data['email']);
        $this->assertEquals($item->bank_account_number, $data['bank_account_number']);
    }


    /**
     * @test
     */
    public function ItCanBeDeleteItemAfterDelete()
    {
        $item = (new CustomerFactory())->create();

        $response = $this->delete(route('api.Customer.delete', $item->id));

        $response->assertStatus(200);

        $this->assertDatabaseMissing(Customer::class, [
            'id' => $item->id,
            'first_name' => $item->first_name,
            'last_name' => $item->last_name,
            'date_of_birth' => $item->date_of_birth,
            'phone_number' => $item->phone_number,
            'email' => $item->email,
            'bank_account_number' => $item->bank_account_number,
        ]);
    }
}
