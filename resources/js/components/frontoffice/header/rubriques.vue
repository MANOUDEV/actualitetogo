<template>
    <div class="container">

        <div v-if="loading">
            <br><br><br>
            <div class="d-flex justify-content-center mt-3">
                <div class="spinner-border text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <br><br><br>
        </div>
        <div v-else class="row g-4 p-3 flex-fill">

            <div  v-if="empty === 1">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <div style="position: relative; height: 250px;">
                          <img src="https://actualitetogo.com/assets/images/empty.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                      </div>
                      <h5 style="text-align: center; margin-top: -50px"> {{ rubriquesMessage  }} </h5>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>

            <div  v-if="empty === 3">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <div style="position: relative; height: 250px;">
                          <img src="https://actualitetogo.com/assets/images/error.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                      </div>
                      <h5 style="text-align: center; margin-top: -50px"> {{ rubriquesMessage  }} </h5>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3" v-else-if="empty === 0" v-for="result in rubriquesData" :key="result.id">
                <div class="card bg-transparent" v-if="result.image_cover_url">
                    <!-- Card img -->
                    <img class="card-img rounded" :src='getImage(result.image_cover_url)' style="height: 150px; object-fit: cover" :alt='result.title'>
                    <div class="card-body px-0 pt-3">
                        <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                        <!-- Card info -->
                        <ul class="nav nav-divider align-items-center text-uppercase small mt-2"> 
                            <li class="nav-item">
                                <span @click="author(result.author_slug)" style="cursor: pointer" class="text-reset btn-link">{{ result.author_name }}</span>
                            </li>
                            <li class="nav-item">{{ moment(result.date_publish).format("DD/MM/YYYY") }}</li>
                        </ul>
                    </div>
                </div>
                <div v-else>
                    <div class="card mb-4">
                        <div class="card-body border rounded-3">
                            
                            <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                            <p class="card-text" v-html="truncate_content"> </p>
                            <!-- Card info -->
                            <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                <li class="nav-item">
                                    <span @click="author(result.author_slug)" style="cursor: pointer" class="text-reset btn-link">{{ result.author_name }}</span>
                                </li>
                                <li class="nav-item">{{ moment(result.date_publish).format("DD/MM/YYYY") }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trending tags -->
            <div class="row px-3">
                <div class="col-12">
                    <ul class="list-inline mt-3">
                        <li class="list-inline-item">
                            <span style="cursor: pointer" v-if="rubriquesState" @click="rubriques" class="btn btn-sm btn-success">Rubriques+</span>
                            <span style="cursor: pointer" v-else @click="rubriques" class="btn btn-sm btn-primary-soft">Rubriques+</span>
                        </li>
                        <li class="list-inline-item">
                            <span style="cursor: pointer" v-if="chroniquesState" @click="chroniques" class="btn btn-sm btn-success">Chroniques</span>
                            <span style="cursor: pointer" v-else @click="chroniques" class="btn btn-sm btn-primary-soft">Chroniques</span>
                        </li>
                        <li class="list-inline-item">
                            <span style="cursor: pointer" v-if="diplomatieState" @click="diplomatie" class="btn btn-sm btn-success">Diplomatie</span>
                            <span style="cursor: pointer" v-else @click="diplomatie" class="btn btn-sm btn-primary-soft">Diplomatie</span>
                        </li>
                    </ul>
                </div>
            </div> <!-- Row END -->
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex';
import moment from 'moment'
export default {

    data(){
        return {
            loading: true,
            rubriquesData: {},
            rubriquesMessage: null,
            empty: 2,
            diplomatieState: false,
            rubriquesState: true,
            chroniquesState: false,
        }
    },

    computed:{
        ...mapGetters('rubriques',{
            getterInfosRubriquesStatus:'getInfosRubriquesStatus',
            getterInfosRubriquesMessage:'getInfosRubriquesMessage',
            getterInfosRubriquesData:'getInfosRubriquesData',
            getterInfosDiplomatieStatus:'getInfosDiplomatieStatus',
            getterInfosDiplomatieMessage:'getInfosDiplomatieMessage',
            getterInfosDiplomatieData:'getInfosDiplomatieData',
            getterInfosChroniquesStatus:'getInfosChroniquesStatus',
            getterInfosChroniquesMessage:'getInfosChroniquesMessage',
            getterInfosChroniquesData:'getInfosChroniquesData',
        }),
    },
    methods:{

        ...mapActions('rubriques',{
            actionRubriquesDataRequest:'rubriquesDataRequest',
            actionChroniquesDataRequest:'chroniquesDataRequest',
            actionDiplomatieDataRequest:'diplomatieDataRequest'
        }),
        

       async getResults(){
 

            await this.actionRubriquesDataRequest({});

            if( this.getterInfosRubriquesStatus ==="success"){

                this.rubriquesData = this.getterInfosRubriquesData

                this.empty = 0

                this.loading = false

            }else if( this.getterInfosRubriquesStatus ==="empty"){

                this.rubriquesMessage = this.getterInfosRubriquesMessage

                this.empty = 1

                this.loading = false

            }else{

                this.rubriquesMessage = this.getterInfosRubriquesMessage

                this.empty = 3

                this.loading = false

            }
        },

        author(slug){
            window.location = '/authors/' + slug
        },

        article(slug){
            window.location = '/' + slug
        },

        getImage(slug){
            return  slug;
        },

        async diplomatie(){
            this.diplomatieState= true
            this.chroniquesState= false
            this.rubriquesState= false
             
            await this.actionDiplomatieDataRequest({});

            if( this.getterInfosDiplomatieStatus ==="success"){

                this.rubriquesData = this.getterInfosDiplomatieData

                this.empty = 0

                this.loading = false

            }else if( this.getterInfosDiplomatieStatus ==="empty"){

                this.rubriquesMessage = this.getterInfosDiplomatieMessage

                this.empty = 1

                this.loading = false

            }else{

                this.rubriquesMessage = this.getterInfosDiplomatieMessage

                this.empty = 3

                this.loading = false

            }
        },

        rubriques(){
            this.diplomatieState = false,
            this.chroniquesState = false,
            this.rubriquesState = true, 
            this.getResults();
        },

        async chroniques(){
            this.diplomatieState = false,
            this.chroniquesState = true,
            this.rubriquesState = false,
            await this.actionChroniquesDataRequest({});

            if( this.getterInfosChroniquesStatus ==="success"){

                this.rubriquesData = this.getterInfosChroniquesData

                this.empty = 0

                this.loading = false

            }else if( this.getterInfosChroniquesStatus ==="empty"){

                this.rubriquesMessage = this.getterInfosChroniquesMessage

                this.empty = 1

                this.loading = false

            }else{

                this.rubriquesMessage = this.getterInfosChroniquesMessage

                this.empty = 3

                this.loading = false

            }
        },
    },

    mounted(){
        this.moment = moment
        this.getResults();
    }
}

</script>
