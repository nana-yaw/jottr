<template>

    <div>
        <div class="flex justify-between">
            <a href="#" @click="$router.back()" class="text-blue-400">
                < Back
            </a>
        </div>

        <form @submit.prevent="submitForm">

            <InputField name="name" label="Contact Name"
             placeholder="Contact Name" :errors="errors" @update:field="form.name = $event" :data="form.name" />

            <InputField name="email" label="Contact Email"
             placeholder="Contact Email" :errors="errors" @update:field="form.email = $event" :data="form.email" />

            <InputField name="company" label="Company"
             placeholder="Company" :errors="errors" @update:field="form.company = $event" :data="form.company" />

            <InputField name="birthday" label="Birthday"
             placeholder="MM/DD/YYYY" :errors="errors" @update:field="form.birthday = $event" :data="form.birthday" />

            <div class="flex justify-end">

                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>

                <button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Save</button>

            </div>

        </form>
    </div>

</template>

<script>

import InputField from '../components/InputField';

    export default {
        name: "ContactsEdit",

        components: {
            InputField
        },

        mounted () {
            axios.get('/api/contacts/' + this.$route.params.id)
            .then(response => {
                this.form =response.data.data;
                this.loading = false;
                
            })
            .catch(error => {
                this.loading = false;

                if (error.response.status === 404) {

                    this.$router.push('/contacts')
                }
            });
        },

        data: function () {
            return {
                loading: true,
                form: {
                    'name' : '',
                    'email' : '',
                    'company' : '',
                    'birthday' : '',
                },

                errors: null,
            }
        },

        methods: {
            submitForm: function () {

                axios.patch('/api/contacts/' + this.$route.params.id, this.form)
                     
                     .then(response => {

                         console.log(response.data);

                         this.$router.push(response.data.links.self);

                     })
                     
                     .catch(errors => {

                         console.log(errors)

                         this.errors = errors.response.data.errors;

                     });
            }
        }
    }

</script>

<style scoped>



</style>
