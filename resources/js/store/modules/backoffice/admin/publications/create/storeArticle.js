import jwtInterceptor  from '../../../../../../shared/jwtInterceptor';
const state = () => ({
 
    infosPublicationStoreArticleFirstStatus:null,
    infosPublicationStoreArticleFirstMessage:null,
    infosPublicationStoreArticleFirstData:[],
    infosPublicationStoreArticleFirstErrors:[],

    infosPublicationUpdateArticleFirstStatus:null,
    infosPublicationUpdateArticleFirstMessage:null,
    infosPublicationUpdateArticleFirstData:[],
    infosPublicationUpdateArticleFirstErrors:[],

    infosPublicationStoreArticleTwoStatus:null,
    infosPublicationStoreArticleTwoMessage:null,
    infosPublicationStoreArticleTwoData:[],
    infosPublicationStoreArticleTwoErrors:[],

    infosPublicationUpdateArticleTwoStatus:null,
    infosPublicationUpdateArticleTwoMessage:null,
    infosPublicationUpdateArticleTwoData:[],
    infosPublicationUpdateArticleTwoErrors:[],

    infosPublicationStoreArticleFourStatus:null,
    infosPublicationStoreArticleFourMessage:null,
    infosPublicationStoreArticleFourData:[],
    infosPublicationStoreArticleFourErrors:[],

    infosPublicationUpdateArticleFourStatus:null,
    infosPublicationUpdateArticleFourMessage:null,
    infosPublicationUpdateArticleFourData:[],
    infosPublicationUpdateArticleFourErrors:[],
 
});
const getters = { 

    getInfosPublicationStoreArticleFirstStatus(state){
        return state.infosPublicationStoreArticleFirstStatus;
    },

    getInfosPublicationStoreArticleFirstMessage(state){
        return state.infosPublicationStoreArticleFirstMessage;
    },

    getInfosPublicationStoreArticleFirstData(state){
        return state.infosPublicationStoreArticleFirstData;
    },  
    
    getInfosPublicationStoreArticleFirstErrors(state){
        return state.infosPublicationStoreArticleFirstErrors;
    },  

    getInfosPublicationUpdateArticleFirstStatus(state){
        return state.infosPublicationUpdateArticleFirstStatus;
    },

    getInfosPublicationUpdateArticleFirstMessage(state){
        return state.infosPublicationUpdateArticleFirstMessage;
    },

    getInfosPublicationUpdateArticleFirstData(state){
        return state.infosPublicationUpdateArticleFirstData;
    },  
    
    getInfosPublicationUpdateArticleFirstErrors(state){
        return state.infosPublicationUpdateArticleFirstErrors;
    },   

    getInfosPublicationStoreArticleTwoStatus(state){
        return state.infosPublicationStoreArticleTwoStatus;
    },

    getInfosPublicationStoreArticleTwoMessage(state){
        return state.infosPublicationStoreArticleTwoMessage;
    },

    getInfosPublicationStoreArticleTwoData(state){
        return state.infosPublicationStoreArticleTwoData;
    },  
    
    getInfosPublicationStoreArticleTwoErrors(state){
        return state.infosPublicationStoreArticleTwoErrors;
    },  

    getInfosPublicationUpdateArticleTwoStatus(state){
        return state.infosPublicationUpdateArticleTwoStatus;
    },

    getInfosPublicationUpdateArticleTwoMessage(state){
        return state.infosPublicationUpdateArticleTwoMessage;
    },

    getInfosPublicationUpdateArticleTwoData(state){
        return state.infosPublicationUpdateArticleTwoData;
    },  
    
    getInfosPublicationUpdateArticleTwoErrors(state){
        return state.infosPublicationUpdateArticleTwoErrors;
    },   

    getInfosPublicationStoreArticleFourStatus(state){
        return state.infosPublicationStoreArticleFourStatus;
    },

    getInfosPublicationStoreArticleFourMessage(state){
        return state.infosPublicationStoreArticleFourMessage;
    },

    getInfosPublicationStoreArticleFourData(state){
        return state.infosPublicationStoreArticleFourData;
    },  
    
    getInfosPublicationStoreArticleFourErrors(state){
        return state.infosPublicationStoreArticleFourErrors;
    },  

    getInfosPublicationUpdateArticleFourStatus(state){
        return state.infosPublicationUpdateArticleFourStatus;
    },

    getInfosPublicationUpdateArticleFourMessage(state){
        return state.infosPublicationUpdateArticleFourMessage;
    },

    getInfosPublicationUpdateArticleFourData(state){
        return state.infosPublicationUpdateArticleFourData;
    },  
    
    getInfosPublicationUpdateArticleFourErrors(state){
        return state.infosPublicationUpdateArticleFourErrors;
    },   
}

const actions = {  

    async publicationStoreArticleFirstDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.post(`backoffice/admin/publications/create/${payload.slug}/store_article_first`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationStoreArticleFirstStatus", "success");
            commit("setInfosPublicationStoreArticleFirstMessage", response.data.message);
            commit("setInfosPublicationStoreArticleFirstData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationStoreArticleFirstStatus", "empty");
            commit("setInfosPublicationStoreArticleFirstErrors", response.data.data.errors);
            commit("setInfosPublicationStoreArticleFirstMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationStoreArticleFirstStatus", "error");
            commit("setInfosPublicationStoreArticleFirstMessage", response.data.message);
        }
    },

    async publicationUpdateArticleFirstDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/${payload.publication_slug}/update_article_first`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationUpdateArticleFirstStatus", "success");
            commit("setInfosPublicationUpdateArticleFirstMessage", response.data.message);
            commit("setInfosPublicationUpdateArticleFirstData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationUpdateArticleFirstStatus", "empty");
            commit("setInfosPublicationUpdateArticleFirstErrors", response.data.data.errors);
            commit("setInfosPublicationUpdateArticleFirstMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationUpdateArticleFirstStatus", "error");
            commit("setInfosPublicationUpdateArticleFirstMessage", response.data.message);
        }
    }, 

    async publicationStoreArticleTwoDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/store_article_two`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationStoreArticleTwoStatus", "success");
            commit("setInfosPublicationStoreArticleTwoMessage", response.data.message);
            commit("setInfosPublicationStoreArticleTwoData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationStoreArticleTwoStatus", "empty");
            commit("setInfosPublicationStoreArticleTwoErrors", response.data.data.errors);
            commit("setInfosPublicationStoreArticleTwoMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationStoreArticleTwoStatus", "error");
            commit("setInfosPublicationStoreArticleTwoMessage", response.data.message);
        }
    },

    async publicationUpdateArticleTwoDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/${payload.publication_slug}/update_article_two`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationUpdateArticleTwoStatus", "success");
            commit("setInfosPublicationUpdateArticleTwoMessage", response.data.message);
            commit("setInfosPublicationUpdateArticleTwoData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationUpdateArticleTwoStatus", "empty");
            commit("setInfosPublicationUpdateArticleTwoErrors", response.data.data.errors);
            commit("setInfosPublicationUpdateArticleTwoMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationUpdateArticleTwoStatus", "error");
            commit("setInfosPublicationUpdateArticleTwoMessage", response.data.message);
        }
    }, 

    async publicationStoreArticleFourDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/store_article_four`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationStoreArticleFourStatus", "success");
            commit("setInfosPublicationStoreArticleFourMessage", response.data.message);
            commit("setInfosPublicationStoreArticleFourData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationStoreArticleFourStatus", "empty");
            commit("setInfosPublicationStoreArticleFourErrors", response.data.data.errors);
            commit("setInfosPublicationStoreArticleFourMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationStoreArticleFourStatus", "error");
            commit("setInfosPublicationStoreArticleFourMessage", response.data.message);
        }
    },

    async publicationUpdateArticleFourDataRequest({ commit }, payload) {
        const response = await jwtInterceptor.put(`backoffice/admin/publications/create/${payload.slug}/${payload.publication_slug}/update_article_four`, payload).catch((err) => { console.log(err);});
        if (response && (response.data.data.status == 200)) {
            commit("setInfosPublicationUpdateArticleFourStatus", "success");
            commit("setInfosPublicationUpdateArticleFourMessage", response.data.message);
            commit("setInfosPublicationUpdateArticleFourData", response.data.data);
        }else if(response.data.data.status == 401) {
            commit("setInfosPublicationUpdateArticleFourStatus", "empty");
            commit("setInfosPublicationUpdateArticleFourErrors", response.data.data.errors);
            commit("setInfosPublicationUpdateArticleFourMessage", response.data.message);
        }else if(response.data.data.status == 422){
            commit("setInfosPublicationUpdateArticleFourStatus", "error");
            commit("setInfosPublicationUpdateArticleFourMessage", response.data.message);
        }
    }, 
}

const mutations = { 

    setInfosPublicationStoreArticleFirstStatus(state, value){
        state.infosPublicationStoreArticleFirstStatus = value;
    },

    setInfosPublicationStoreArticleFirstMessage(state, value){
        state.infosPublicationStoreArticleFirstMessage = value;
    },

    setInfosPublicationStoreArticleFirstData(state, value){
        state.infosPublicationStoreArticleFirstData = value;
    },

    setInfosPublicationStoreArticleFirstErrors(state, value){
        state.infosPublicationStoreArticleFirstErrors = value;
    },

    setInfosPublicationUpdateArticleFirstStatus(state, value){
        state.infosPublicationUpdateArticleFirstStatus = value;
    },

    setInfosPublicationUpdateArticleFirstMessage(state, value){
        state.infosPublicationUpdateArticleFirstMessage = value;
    },

    setInfosPublicationUpdateArticleFirstData(state, value){
        state.infosPublicationUpdateArticleFirstData = value;
    },

    setInfosPublicationUpdateArticleFirstErrors(state, value){
        state.infosPublicationUpdateArticleFirstErrors = value;
    }, 


    setInfosPublicationStoreArticleTwoStatus(state, value){
        state.infosPublicationStoreArticleTwoStatus = value;
    },

    setInfosPublicationStoreArticleTwoMessage(state, value){
        state.infosPublicationStoreArticleTwoMessage = value;
    },

    setInfosPublicationStoreArticleTwoData(state, value){
        state.infosPublicationStoreArticleTwoData = value;
    },

    setInfosPublicationStoreArticleTwoErrors(state, value){
        state.infosPublicationStoreArticleTwoErrors = value;
    },

    setInfosPublicationUpdateArticleTwoStatus(state, value){
        state.infosPublicationUpdateArticleTwoStatus = value;
    },

    setInfosPublicationUpdateArticleTwoMessage(state, value){
        state.infosPublicationUpdateArticleTwoMessage = value;
    },

    setInfosPublicationUpdateArticleTwoData(state, value){
        state.infosPublicationUpdateArticleTwoData = value;
    },

    setInfosPublicationUpdateArticleTwoErrors(state, value){
        state.infosPublicationUpdateArticleTwoErrors = value;
    }, 

    setInfosPublicationStoreArticleFourStatus(state, value){
        state.infosPublicationStoreArticleFourStatus = value;
    },

    setInfosPublicationStoreArticleFourMessage(state, value){
        state.infosPublicationStoreArticleFourMessage = value;
    },

    setInfosPublicationStoreArticleFourData(state, value){
        state.infosPublicationStoreArticleFourData = value;
    },

    setInfosPublicationStoreArticleFourErrors(state, value){
        state.infosPublicationStoreArticleFourErrors = value;
    },

    setInfosPublicationUpdateArticleFourStatus(state, value){
        state.infosPublicationUpdateArticleFourStatus = value;
    },

    setInfosPublicationUpdateArticleFourMessage(state, value){
        state.infosPublicationUpdateArticleFourMessage = value;
    },

    setInfosPublicationUpdateArticleFourData(state, value){
        state.infosPublicationUpdateArticleFourData = value;
    },

    setInfosPublicationUpdateArticleFourErrors(state, value){
        state.infosPublicationUpdateArticleFourErrors = value;
    }, 
}

export default{
    namespaced:true,
    state,
    getters,
    actions,
    mutations
}
