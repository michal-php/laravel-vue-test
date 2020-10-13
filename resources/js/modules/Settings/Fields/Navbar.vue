<template>
    <div>
        <b-nav align="right" pills>

            <b-button @click.prevent="addField" variant="outline-primary">
                <strong>+</strong> Add New
            </b-button>

            <b-nav-item-dropdown
                id="my-nav-dropdown"
                text="Actions"
                toggle-class="nav-link-custom"
                right
            >
                <b-dropdown-item>Duplicate</b-dropdown-item>
                <b-dropdown-divider></b-dropdown-divider>
                <b-dropdown-item>Delete</b-dropdown-item>
            </b-nav-item-dropdown>
        </b-nav>
        <edit-field-modal modal-title="Add New"></edit-field-modal>
    </div>
</template>

<script>
    import EditFieldModal from "./EditFieldModal";

    export default {
        name: "Navbar",

        components: {
           EditFieldModal
        },

        props: ['path'],

        methods: {
            addField() {
                this.$bvModal.show('edit-field-modal');
            }
        }

    }
</script>

<style scoped>

</style>
