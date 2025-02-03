import jwtInterceptor  from '../../../../../../shared/jwtInterceptor';
const state = () => ({
 
    infosPublicationStorePublicitesFirstStatus:null,
    infosPublicationStorePublicitesFirstMessage:null,
    infosPublicationStorePublicitesFirstData:[],
    infosPublicationStorePublicitesFirstErrors:[],

    infosPublicationUpdatePublicitesFirstStatus:null,
    infosPublicationUpdatePublicitesFirstMessage:null,
    infosPublicationUpdatePublicitesFirstData:[],
    infosPublicationUpdatePublicitesFirstErrors:[],

    infosPublicationStorePublicitesThreeStatus:null,
    infosPublicationStorePublicitesThreeMessage:null,
    infosPublicationStorePublicitesThreeData:[],
    infosPublicationStorePublicitesThreeErrors:[],

    infosPublicationUpdatePublicitesThreeStatus:null,
    infosPublicationUpdatePublicitesThreeMessage:null,
    infosPublicationUpdatePublicitesThreeData:[],
    infosPublicationUpdatePublicitesThreeErrors:[],
 
});
const getters = { 
     
    getInfosPublicationStorePublicitesFirstStatus(state){
        return state.infosPublicationStorePublicitesFirstStatus;
    },

    getInfosPublicationStorePublicitesFirstMessage(state){
        return state.infosPublicationStorePublicitesFirstMessage;
    },

    getInfosPublicationStorePublicitesFirstData(state){
        return state.infosPublicationStorePublicitesFirstData;
    },  
    
    getInfosPublicationStorePublicitesFirstErrors(state){
        return state.infosPublicationStorePublicitesFirstErrors;
    },  

    getInfosPublicationUpdatePublicitesFirstStatus(state){
        return state.infosPublicationUpdatePublicitesFirstStatus;
    },

    getInfosPublicationUpdatePublicitesFirstMessage(state){
        return state.infosPublicationUpdatePublicitesFirstMessage;
    },

    getInfosPublicationUpdatePublicitesFirstData(state){
        return state.infosPublicationUpdatePublicitesFirstData;
    },  
    
    getInfosPublicationUpdatePublicitesFirstErrors(state){
        return state.infosPublicationUpdatePublicitesFirstErrors;
    },  

    getInfosPublicationStorePublicitesThreeStatus(state){
        return state.infosPublicationStorePublicitesThreeStatus;
    },

    getInfosPublicationStorePublicitesThreeMessage(state){
        return state.infosPublicationStorePublicitesThreeMessage;
    },

    getInfosPublicationStorePublicitesThreeData(state){
        return state.infosPublicationStorePublicitesThreeData;
    },  
    
    getInfosPublicationStorePublicitesThreeErrors(state){
        return state.infosPublicationStorePublicitesThreeErrors;
    },  

    getInfosPublicationUpdatePublicitesThreeStatus(state){
        return state.infosPublicationUpdatePublicitesThreeStatus;
    },

    getInfosPublicationUpdatePublicitesThreeMessage(state){
        return state.infosPublicationUpdatePublicitesThreeMessage;
    },

    getInfosPublicationUpdatePublicitesThreeData(state){
        return state.infosPublicationUpdatePublicitesThreeData;
    },  
    
    getInfosPublicationUpdatePublicitesThreeErrors(state){
        return state.infosPublicationUpdatePublicitesThreeErrors;
    },  
  
}

const actions = { 
    
    async publicationStorePublicitesFirstDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.post(`backoffice/admin/publications/create/${payload.slug}/store_publicites_first`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationStorePublicitesFirstStatus", "success");
            commit("setInfosPublicationStorePublicitesFirstMessage", response.data.message);
            commit("setInfosPublicationStorePublicitesFirstData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationStorePublicitesFirstStatus", "empty");
            commit("setInfosPublicationStorePublicitesFirstErrors", response.data.data.errors);
            commit("setInfosPublicationStorePublicitesFirstMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationStorePublicitesFirstStatus", "error");
            commit("setInfosPublicationStorePublicitesFirstMessage", response.data.message);
        }
    },

    async publicationUpdatePublicitesFirstDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/${payload.publication_slug}/update_publicites_first`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationUpdatePublicitesFirstStatus", "success");
            commit("setInfosPublicationUpdatePublicitesFirstMessage", response.data.message);
            commit("setInfosPublicationUpdatePublicitesFirstData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationUpdatePublicitesFirstStatus", "empty");
            commit("setInfosPublicationUpdatePublicitesFirstErrors", response.data.data.errors);
            commit("setInfosPublicationUpdatePublicitesFirstMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationUpdatePublicitesFirstStatus", "error");
            commit("setInfosPublicationUpdatePublicitesFirstMessage", response.data.message);
        }
    },

    async publicationStorePublicitesThreeDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/${payload.publication_slug}/store_publicites_three`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationStorePublicitesThreeStatus", "success");
            commit("setInfosPublicationStorePublicitesThreeMessage", response.data.message);
            commit("setInfosPublicationStorePublicitesThreeData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationStorePublicitesThreeStatus", "empty");
            commit("setInfosPublicationStorePublicitesThreeErrors", response.data.data.errors);
            commit("setInfosPublicationStorePublicitesThreeMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationStorePublicitesThreeStatus", "error");
            commit("setInfosPublicationStorePublicitesThreeMessage", response.data.message);
        }
    },

    async publicationUpdatePublicitesThreeDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/${payload.publication_slug}/update_publicites_three`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationUpdatePublicitesThreeStatus", "success");
            commit("setInfosPublicationUpdatePublicitesThreeMessage", response.data.message);
            commit("setInfosPublicationUpdatePublicitesThreeData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationUpdatePublicitesThreeStatus", "empty");
            commit("setInfosPublicationUpdatePublicitesThreeErrors", response.data.data.errors);
            commit("setInfosPublicationUpdatePublicitesThreeMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationUpdatePublicitesThreeStatus", "error");
            commit("setInfosPublicationUpdatePublicitesThreeMessage", response.data.message);
        }
    },
 
}

const mutations = { 

    setInfosPublicationStorePublicitesFirstStatus(state, value){
        state.infosPublicationStorePublicitesFirstStatus = value;
    },

    setInfosPublicationStorePublicitesFirstMessage(state, value){
        state.infosPublicationStorePublicitesFirstMessage = value;
    },

    setInfosPublicationStorePublicitesFirstData(state, value){
        state.infosPublicationStorePublicitesFirstData = value;
    },

    setInfosPublicationStorePublicitesFirstErrors(state, value){
        state.infosPublicationStorePublicitesFirstErrors = value;
    },

    setInfosPublicationUpdatePublicitesFirstStatus(state, value){
        state.infosPublicationUpdatePublicitesFirstStatus = value;
    },

    setInfosPublicationUpdatePublicitesFirstMessage(state, value){
        state.infosPublicationUpdatePublicitesFirstMessage = value;
    },

    setInfosPublicationUpdatePublicitesFirstData(state, value){
        state.infosPublicationUpdatePublicitesFirstData = value;
    },

    setInfosPublicationUpdatePublicitesFirstErrors(state, value){
        state.infosPublicationUpdatePublicitesFirstErrors = value;
    },

    setInfosPublicationStorePublicitesThreeStatus(state, value){
        state.infosPublicationStorePublicitesThreeStatus = value;
    },

    setInfosPublicationStorePublicitesThreeMessage(state, value){
        state.infosPublicationStorePublicitesThreeMessage = value;
    },

    setInfosPublicationStorePublicitesThreeData(state, value){
        state.infosPublicationStorePublicitesThreeData = value;
    },

    setInfosPublicationStorePublicitesThreeErrors(state, value){
        state.infosPublicationStorePublicitesThreeErrors = value;
    },

    setInfosPublicationUpdatePublicitesThreeStatus(state, value){
        state.infosPublicationUpdatePublicitesThreeStatus = value;
    },

    setInfosPublicationUpdatePublicitesThreeMessage(state, value){
        state.infosPublicationUpdatePublicitesThreeMessage = value;
    },

    setInfosPublicationUpdatePublicitesThreeData(state, value){
        state.infosPublicationUpdatePublicitesThreeData = value;
    },

    setInfosPublicationUpdatePublicitesThreeErrors(state, value){
        state.infosPublicationUpdatePublicitesThreeErrors = value;
    },
 
}

export default{
    namespaced:true,
    state,
    getters,
    actions,
    mutations
}
