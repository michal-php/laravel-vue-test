
class ModuleDetail{

    constructor(moduleName) {
        this.moduleName = moduleName;
    }

    getBlocksWithFields(then){
        axios.get(`/api/detail-view/fields/${this.moduleName}`)
            .then(({data}) => then(data))
            .catch(error => {
                console.log(error);
                then(false);
            });
    }

}

export default ModuleDetail;
