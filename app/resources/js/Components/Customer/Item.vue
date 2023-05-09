<template>
    <table class="table table-striped table-bordered">
        <tr  v-if="item.id"><td>{{ __('common.id') }}</td><td>{{ item.id }}</td></tr>
        <tr>
            <td>{{ __('common.first_name') }}</td>
            <td>
                <input type="text" id="first_name" class="input" :value="item.first_name"  v-if="edit">
                <label v-if="!edit">{{ item.first_name }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.last_name') }}</td>
            <td>
                <input type="text" id="last_name" class="input" :value="item.last_name"  v-if="edit">
                <label v-if="!edit">{{ item.last_name }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.email') }}</td>
            <td>
                <input type="text" id="email" class="input" :value="item.email"  v-if="edit">
                <label v-if="!edit">{{ item.email }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.phone_number') }}</td>
            <td>
                <input type="text" id="phone_number" class="input" :value="item.phone_number"  v-if="edit">
                <label v-if="!edit">{{ item.phone_number }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.date_of_birth') }}</td>
            <td>
                <input type="text" id="date_of_birth" class="input" :value="item.date_of_birth"  v-if="edit">
                <label v-if="!edit">{{ item.date_of_birth }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.bank_account_number') }}</td>
            <td>
                <input type="text" id="bank_account_number" class="input" :value="item.bank_account_number"  v-if="edit">
                <label v-if="!edit">{{ item.bank_account_number }}</label>
            </td>
        </tr>
        <tr v-if="item.id"><td>{{ __('common.created_at') }}</td><td>{{ item.created_at }}</td></tr>
        <tr v-if="item.id"><td>{{ __('common.updated_at') }}</td><td>{{ item.updated_at }}</td></tr>
    </table>
</template>

<script>
export default {
    props: {
        resource: {
            required: true,
            id:null,
            bank_account_number:null,
            date_of_birth:null,
            email:null,
            first_name:null,
            last_name:null,
            phone_number:null,
            created_at:null,
            updated_at:null,
        },
        edit:false,
    },
    computed: {
        item: {
            get: function() {
                if (this.resource) {
                    return this.resource;
                }
                else {
                    return {
                        id:null,
                        bank_account_number:null,
                        date_of_birth:null,
                        email:null,
                        first_name:null,
                        last_name:null,
                        phone_number:null,
                        created_at:null,
                        updated_at:null,
                    }
                }
                }
            }
        }
}
</script>
