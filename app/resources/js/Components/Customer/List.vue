<template>
    <div class="card">
        <table class="table table-striped table-hovered">
            <thead>
                <th>#</th>
                <th>{{__('common.first_name')}}</th>
                <th>{{__('common.last_name')}}</th>
                <th>{{__('common.email')}}</th>
                <th>{{__('common.phone_number')}}</th>
                <th>{{__('common.view')}}</th>
                <th>{{__('common.edit')}}</th>
                <th>{{__('common.delete')}}</th>
            </thead>
            <tr v-for="item in response.data">
               <td>{{item.id}}</td>
               <td>{{item.first_name}}</td>
               <td>{{item.last_name}}</td>
               <td>{{item.email}}</td>
               <td>{{item.phone_number}}</td>
                <td>
                    <button class="btn btn-light icon" @click="$emit('show', item)">
                        <i class="fe fe-eye" aria-hidden="true"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-blue icon" @click="$emit('edit', item)">
                        <i class="fe fe-edit" aria-hidden="true"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-red icon" @click="$emit('remove', item)">
                        <i class="fe fe-delete" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        response:{}
    },
    methods:{

    }

}
</script>
