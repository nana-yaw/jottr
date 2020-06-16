<template>

    <div>
        <form @submit.prevent="submitForm">

            <InputField name="name" label="Contact Name"
             placeholder="Contact Name" :errors="errors" @update:field="form.name = $event" />

            <InputField name="email" label="Contact Email"
             placeholder="Contact Email" :errors="errors" @update:field="form.email = $event" />

            <InputField name="company" label="Company"
             placeholder="Company" :errors="errors" @update:field="form.company = $event" />

            <InputField name="birthday" label="Birthday"
             placeholder="MM/DD/YYYY" :errors="errors" @update:field="form.birthday = $event" />
            
            <div class="flex justify-end">

                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>

                <button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Add New Contact</button>

            </div>

        </form>
    </div>

</template>

<script>

import InputField from '../components/InputField';

    export default {
        name: "ContactsCreate",
        
        components: {
            InputField
        },

        data: function () {
            return {
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

                axios.post('/api/contacts', this.form)
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