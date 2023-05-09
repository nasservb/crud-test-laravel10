<template>
    <div class="pb-4">
        <div class="card">

            <div class="card-body" >

                <div class="flex-none sm:w-full md:w-2/3">
                    <customer-item :edit="true" :resource="null"></customer-item>
                </div>
            </div>
        </div>

        <button @click="back()" class="btn btn-gray">{{__('layouts.back')}}</button>
        <button @click="save()" class="btn btn-blue">{{__('common.save')}}</button>

    </div>

</template>

<script>

export default {
    data() {
        return {
            id: null,
            resource: {},
        }
    },

    methods: {
        back() {
            this.$router.back();
        },
        save(){
            
            const first_name = document.getElementById("first_name").value;
            const last_name = document.getElementById("last_name").value;
            const date_of_birth = document.getElementById("date_of_birth").value;
            const phone_number = document.getElementById("phone_number").value;
            const email = document.getElementById("email").value;
            const bank_account_number = document.getElementById("bank_account_number").value;

            axios.post(
                route('api.Customer.create'),{ 
                    first_name:first_name,
                    last_name:last_name,
                    date_of_birth:date_of_birth,
                    phone_number:phone_number,
                    email:email,
                    bank_account_number:bank_account_number,
                 })
                .then(response => {
                    alert(__('common.the_record_is_created'));
                    this.$router.push({name:'panel'});
                })
                . catch(errors => {
                    console.log(errors);
                    alert(__('common.the_record_is_not_created')+ ':'+errors.message);
                });

        }
    },
}
</script>
