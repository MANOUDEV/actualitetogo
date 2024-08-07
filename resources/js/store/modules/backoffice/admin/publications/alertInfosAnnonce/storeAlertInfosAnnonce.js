import jwtInterceptor  from '../../../../../../../shared/jwtInterceptor';
const state = () => ({ 

    infosPublicationStoreInfoAlertAnnonceStatus:null,
    infosPublicationStoreInfoAlertAnnonceMessage:null,
    infosPublicationStoreInfoAlertAnnonceData:[],
    infosPublicationStoreInfoAlertAnnonceErrors:[],

    infosPublicationUpdateInfoAlertAnnonceStatus:null,
    infosPublicationUpdateInfoAlertAnnonceMessage:null,
    infosPublicationUpdateInfoAlertAnnonceData:[],
    infosPublicationUpdateInfoAlertAnnonceErrors:[],
 
});
const getters = { 

    getInfosPublicationStoreInfoAlertAnnonceStatus(state){
        return state.infosPublicationStoreInfoAlertAnnonceStatus;
    },

    getInfosPublicationStoreInfoAlertAnnonceMessage(state){
        return state.infosPublicationStoreInfoAlertAnnonceMessage;
    },

    getInfosPublicationStoreInfoAlertAnnonceData(state){
        return state.infosPublicationStoreInfoAlertAnnonceData;
    },  
    
    getInfosPublicationStoreInfoAlertAnnonceErrors(state){
        return state.infosPublicationStoreInfoAlertAnnonceErrors;
    },  

    getInfosPublicationUpdateInfoAlertAnnonceStatus(state){
        return state.infosPublicationUpdateInfoAlertAnnonceStatus;
    },

    getInfosPublicationUpdateInfoAlertAnnonceMessage(state){
        return state.infosPublicationUpdateInfoAlertAnnonceMessage;
    },

    getInfosPublicationUpdateInfoAlertAnnonceData(state){
        return state.infosPublicationUpdateInfoAlertAnnonceData;
    },  
    
    getInfosPublicationUpdateInfoAlertAnnonceErrors(state){
        return state.infosPublicationUpdateInfoAlertAnnonceErrors;
    },  

    
}

const actions = { 
    
    async publicationStoreInfoAlertAnnonceDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.post(`backoffice/admin/publications/create/${payload.slug}/store_info_alert_annonce`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationStoreInfoAlertAnnonceStatus", "success");
            commit("setInfosPublicationStoreInfoAlertAnnonceMessage", response.data.message);
            commit("setInfosPublicationStoreInfoAlertAnnonceData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationStoreInfoAlertAnnonceStatus", "empty");
            commit("setInfosPublicationStoreInfoAlertAnnonceErrors", response.data.data.errors);
            commit("setInfosPublicationStoreInfoAlertAnnonceMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationStoreInfoAlertAnnonceStatus", "error");
            commit("setInfosPublicationStoreInfoAlertAnnonceMessage", response.data.message);
        }
    },

    async publicationUpdateInfoAlertAnnonceDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/${payload.publication_slug}/update_info_alert_annonce`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationUpdateInfoAlertAnnonceStatus", "success");
            commit("setInfosPublicationUpdateInfoAlertAnnonceMessage", response.data.message);
            commit("setInfosPublicationUpdateInfoAlertAnnonceData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationUpdateInfoAlertAnnonceStatus", "empty");
            commit("setInfosPublicationUpdateInfoAlertAnnonceErrors", response.data.data.errors);
            commit("setInfosPublicationUpdateInfoAlertAnnonceMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationUpdateInfoAlertAnnonceStatus", "error");
            commit("setInfosPublicationUpdateInfoAlertAnnonceMessage", response.data.message);
        }
    }, 
}

const mutations = { 

    setInfosPublicationStoreInfoAlertAnnonceStatus(state, value){
        state.infosPublicationStoreInfoAlertAnnonceStatus = value;
    },

    setInfosPublicationStoreInfoAlertAnnonceMessage(state, value){
        state.infosPublicationStoreInfoAlertAnnonceMessage = value;
    },

    setInfosPublicationStoreInfoAlertAnnonceData(state, value){
        state.infosPublicationStoreInfoAlertAnnonceData = value;
    },

    setInfosPublicationStoreInfoAlertAnnonceErrors(state, value){
        state.infosPublicationStoreInfoAlertAnnonceErrors = value;
    },

    setInfosPublicationUpdateInfoAlertAnnonceStatus(state, value){
        state.infosPublicationUpdateInfoAlertAnnonceStatus = value;
    },

    setInfosPublicationUpdateInfoAlertAnnonceMessage(state, value){
        state.infosPublicationUpdateInfoAlertAnnonceMessage = value;
    },

    setInfosPublicationUpdateInfoAlertAnnonceData(state, value){
        state.infosPublicationUpdateInfoAlertAnnonceData = value;
    },

    setInfosPublicationUpdateInfoAlertAnnonceErrors(state, value){
        state.infosPublicationUpdateInfoAlertAnnonceErrors = value;
    },
 
}

export default{
    namespaced:true,
    state,
    getters,
    actions,
    mutations
}
