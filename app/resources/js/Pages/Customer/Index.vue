<template>
    <div>
        <button class=" mt-6 btn btn-green" @click="create">{{__('common.create')}}</button>
        <resource-table-card :response="response" @paginate="paginate($event)" :loading="loading">
            <customer-list
                v-if="response.data.length > 0"
                :response="response"
                @edit="edit($event)"
                @show="show($event)"
                @remove="remove($event)"
            ></customer-list>
        </resource-table-card>
    </div>
</template>

<script>

export default {
    data(){
        return {
            response: {
                data: [],
                meta: {
                    from: 1,
                },
            },
            loading:false,
            query: {
                page: 1,
            },
        }
    },
    methods:{
        getItems(){
            this.loading = true;
            axios.get('/api/customer/index', {params: this.query})
                .then(response => {
                    this.response = response.data;
                })
                .catch(errors => {
                    console.log(errors);
                })
                .finally(() => {
                    this.loading = false;
                })
        },
        create(){
            this.$router.push('/create');
        },
        edit(item){
            this.$router.push('/edit/'+item.id);
        },
        show(item){
            this.$router.push({path: '/show/'+item.id});
        },
        remove(item){
            const accept = confirm(__('common.are_you_sure_to_delete'));
            if (accept){
                axios.delete(route('api.Customer.delete', { customer: item.id }))
                    .then(response => {
                        alert(__('common.the_record_is_deleted'));
                        this.getItems();
                    })
                    . catch(errors => {
                        console.log(errors);
                        alert(__('common.the_record_is_not_deleted'));
                    });
            }
        },
        paginate(page) {
            this.query.page = page;
            this.$router.push({name: 'panel', query: this.query});

        },
    },
    created() {
        _.each(this.$route.query, (query, index) => {
            if (_.has(this.query, index)) {
                this.query[index] = query;
            }
        });

    },
    mounted() {
        this.getItems();

    }
}
</script>
