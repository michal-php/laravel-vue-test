<template>
    <div class="clients .container-lg" >

        <b-dropdown right text="Actions" style="margin-bottom: 10px; margin-left:15px">
            <b-dropdown-item @click="getSelectedRows()">Get selected rows</b-dropdown-item>
            <b-dropdown-item>Send Mail</b-dropdown-item>
            <b-dropdown-item>Delete</b-dropdown-item>
            <b-dropdown-item>Import</b-dropdown-item>
            <b-dropdown-item>Export</b-dropdown-item>
        </b-dropdown>

        <b-button  style="margin-bottom: 10px; margin-left:15px" to="/clients/new">
            <strong>+</strong> Add New
        </b-button>

        <ag-grid-vue @rowClicked="clientDetail" style="min-width: 100%; height: 800px;"
                     class="ag-theme-alpine container"
                     :columnDefs="columnDefs"
                     :rowData="rowData"
                     rowSelection="multiple"
                     @grid-ready="onGridReady">
        </ag-grid-vue>
    </div>
</template>

<script>
    import {AgGridVue} from "ag-grid-vue";
    import Clients from "../../models/Clients";

    export default {
        name: 'Clients',
        data() {
            return {
                columnDefs: null,
                rowData: null
            }
        },
        components: {
            AgGridVue
        },
        methods: {
            onGridReady(params) {
                this.gridApi = params.api;
                this.columnApi = params.columnApi;
            },
            getSelectedRows() {
                const selectedNodes = this.gridApi.getSelectedNodes();
                const selectedData = selectedNodes.map( node => node.data );
                const selectedDataStringPresentation = selectedData.map( node => node.first_name + ' ' + node.last_name).join(', ');
                console.log(selectedDataStringPresentation);
                alert(`Selected nodes: ${selectedDataStringPresentation}`);
            },
            clientDetail(e) {
                const clientId = e.data.id;
                this.$router.push({name: 'ClientDetail',  params: { clientId }});
            }
        },
        beforeMount() {
            this.columnDefs = [
                {headerName: 'First Name', field: 'first_name', sortable: true, filter: true, checkboxSelection: true },
                {headerName: 'Last Name', field: 'last_name', sortable: true, filter: true },
                {headerName: 'Email', field: 'email', sortable: true, filter: true },
                {headerName: 'Date of Birth', field: 'date_of_birth', sortable: true, filter: true },
                {headerName: 'Phone', field: 'phone', sortable: true, filter: true },
                {headerName: 'City', field: 'city', sortable: true, filter: true },
                {headerName: 'ZIP', field: 'zip', sortable: true, filter: true },
                {headerName: 'Street', field: 'street', sortable: true, filter: true },
                {headerName: 'Country', field: 'country', sortable: true, filter: true },
                {headerName: 'Nationality', field: 'nationality', sortable: true, filter: true },
                {headerName: 'Birth Number', field: 'birt_number', sortable: true, filter: true },
            ];

            Clients.all(clients => this.rowData = clients);
        }
    }
</script>

<style scoped>
    .clients{
        margin-top:15px;
    }
</style>
