<template>
  <div class="pb-4">
    <div class="card">

        <div class="card-body" >

            <div class="flex-none sm:w-full md:w-2/3">
                <customer-item  :edit="false" :resource="resource"></customer-item>
            </div>
        </div>
    </div>

    <button @click="back()" class="btn btn-gray">{{__('layouts.back')}}</button>
    <button @click="edit()" class="btn btn-blue">{{__('common.edit')}}</button>
    <button @click="remove()" class="btn btn-red">{{__('common.delete')}}</button>

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
        getResource() {
            axios.get(route('api.Customer.show', { customer: this.id }))
                .then(response => {
                    this.resource = response.data.data;
                })
                . catch(errors => {
                    console.log(errors);
                });

        },
        back() {
            this.$router.back();
        },
        edit(){
            this.$router.push('/edit/'+this.resource.id);
        },
        remove(){
            const accept = confirm(__('common.are_you_sure_to_delete'));
            if (accept){
                axios.delete(route('api.Customer.delete', { customer: this.id }))
                    .then(response => {
                        alert(__('common.the_record_is_deleted'));
                        this.$router.push({name:'panel'});
                    })
                    . catch(errors => {
                        console.log(errors);
                        alert(__('common.the_record_is_not_deleted'));
                    });
            }
        }
    },

    created() {
        this.id = this.$route.params.customer;

        this.getResource();
    },

}
</script>
