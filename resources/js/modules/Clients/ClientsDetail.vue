<template>
    <div class="container">
        <navbar-detail :path="{path: '/clients/edit/'+id}" class="navbar-detail"></navbar-detail>

        <div class="mt-3" v-for="block in this.blocksOfFields">
            <div class="row" v-for="chunk in getFieldRows(block.fields)">
                <template v-for="field in chunk">
                    <!-- Label -->
                    <div class="col" align="right"><strong>{{field.label}}</strong></div>
                    <!-- Field -->
                    <component class="col" :value="fieldValue(field)" :is="fieldName(field)"></component>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import Clients from "../../models/Clients";
    import NavbarDetail from "../../components/NavbarDetail";
    import ModuleDetail from "../../models/ModuleDetail";
    // TODO need to be dynamic
    import AttachmentField from "../../components/Fields/AttachmentField.vue";
    import CheckboxField from "../../components/Fields/CheckboxField.vue";
    import DateField from "../../components/Fields/DateField.vue";
    import EmailField from "../../components/Fields/EmailField.vue";
    import NumberField from "../../components/Fields/NumberField.vue";
    import PasswordField from "../../components/Fields/PasswordField.vue";
    import PhoneField from "../../components/Fields/PhoneField.vue";
    import SelectField from "../../components/Fields/SelectField.vue";
    import StringField from "../../components/Fields/StringField.vue";
    import TextField from "../../components/Fields/TextField.vue";

    export default {

        name: "ClientsDetail",
        components: {
            NavbarDetail,

            // TODO need to be dynamic
            AttachmentField,
            CheckboxField,
            DateField,
            EmailField,
            NumberField,
            PasswordField,
            PhoneField,
            SelectField,
            StringField,
            TextField
        },

        data() {
            return {
                id: null,
                client: null,
                moduleName: 'Clients',
                itemsPerRow: 2,
                blocksOfFields: null,
                module: null
            }
        },
        created() {
            this.id = this.$route.params.clientId

            module = new ModuleDetail(this.moduleName);
            module.getBlocksWithFields(module => {
                this.module = module;
                this.blocksOfFields = this.module.field_blocks;
            } );

            this.client = Clients.get(this.id, client => this.client = client);
        },

        computed: {
            rows() {
                return _.chain(this.client).toPairs().chunk(this.itemsPerRow).map(_.fromPairs).value();
            },

        },

        methods: {
            getFieldRows(fields){
                return _.chunk(Object.values(fields), 2);
            },

            fieldName(field) {
                return _.capitalize(field.field_type.name)+'Field';
            },

            fieldValue(field){
                return this.client[field.name];
            }
        }
    }
</script>

<style scoped>
    .navbar-detail{
        margin:15px 0px 25px 0px;
    }

</style>
