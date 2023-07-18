<template>

</template>

<script>
export default {

    created() {
        const token = this.token;
        
        console.log('token is ', token);
        if (token != 'undefined') {
            this.auth = token;
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
        }

        if (token == 'undefined' || !this.auth || token.length <= 10) {
            
        } else {
            this.$router.push({
                name: 'panel'
            });
        }
    },

}
</script>
