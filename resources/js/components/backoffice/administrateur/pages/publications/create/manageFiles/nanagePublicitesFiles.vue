<template>
    <div class="modal fade" id="uploadPhotosVideosModalpublicationStorePublicitesCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down"> 
            <!-- Login Form -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Gestion des fichiers</h5> 
                    <button type="button" class="btn-close" @click="uploadPhotosVideosModalClose" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- Chart START -->
                            <div class="card border h-100">
            
                                <!-- Card header -->
                                <div class="card-header p-3 border-bottom">
                                    <h5 class="card-header-title mb-0">Ajouter vos photos et videos</h5>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <label class="form-label">Uploadez ou selectionnez vos fichiers</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        <!-- Post type item -->
                                        <div class="flex-fill" @click="UploadState">
                                            <input type="radio" class="btn-check"  name="poll" id="option" checked>
                                            <label class="btn btn-outline-light w-100" for="option">
                                                <i class="bi bi-card-image fs-1"></i>
                                                <span class="d-block">Uploadez des fichiers</span>
                                            </label>
                                        </div>
                                        <!-- Post type item -->
                                        <div class="flex-fill" @click="LinkState">
                                            <input type="radio" class="btn-check" name="poll" id="option2">
                                            <label class="btn btn-outline-light w-100" for="option2">
                                                <i class="bi bi-link-45deg fs-1"></i>
                                                <span class="d-block">Liens vidéos</span>
                                            </label>
                                        </div>
                                        <!-- Post type item -->
                                        <div class="flex-fill"  @click="IframeState">
                                            <input type="radio" class="btn-check" name="poll" id="option3" >
                                            <label class="btn btn-outline-light w-100" for="option3">
                                                <i class="bi bi-file-earmark-code fs-1"></i>
                                                <span class="d-block">Iframes vidéos</span>
                                            </label>
                                        </div>
                                        <!-- Post type item -->
                                        <div class="flex-fill"  @click="ExistState">
                                            <input type="radio" class="btn-check" name="poll" id="option4">
                                            <label class="btn btn-outline-light w-100" for="option4">
                                                <i class="bi bi-cloud-plus fs-1"></i>
                                                <span class="d-block">Déjà existant</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <form class="container" v-if="LinkStateButton">
                                    <div class="col-lg-12 mt-3"  v-if="manageFilesPubStoreCreateErrors.file_name">
                                        <label class="form-label" >Non du fichier</label>
                                        <input  name="file_name" v-model="file_name" type="text" class="form-control" placeholder="Veuillez entrer le nom du fichier">
                                    </div>
            
                                    <div class="col-lg-12 mt-3"  v-else>
                                        <label class="form-label" >Non du fichier</label>
                                        <input  name="file_name" v-model="file_name" type="text" class="form-control" placeholder="Veuillez entrer le nom du fichier">
                                    </div>
                                    <div class="col-lg-12 mt-3"  v-if="manageFilesPubStoreCreateErrors.file_url">
                                        <label class="form-label" >URL fichier</label>
                                        <input  name="file_url" v-model="file_url" type="url" class="form-control" placeholder="Veuillez entrer le lien du fichier">
                                    </div>
            
                                    <div class="col-lg-12 mt-3"  v-else>
                                        <label class="form-label" >URL fichier</label>
                                        <input  name="file_url" v-model="file_url" type="url" class="form-control" placeholder="Veuillez entrer le lien du fichier">
                                    </div>
                                    <div class="col-lg-12 mt-3"  v-if="manageFilesPubStoreCreateErrors.description_file">
                                        <label class="form-label" >Ajoutez une description au fichier</label>
                                        <input  name="description_file" v-model="description_file" type="text" class="form-control" placeholder="Veuillez décrire le fichier">
                                    </div>
            
                                    <div class="col-lg-12 mt-3"  v-else>
                                        <label class="form-label" >Ajoutez une description au fichier</label>
                                        <input  name="description_file" v-model="description_file" type="text" class="form-control" placeholder="Veuillez décrire le fichier">
                                    </div>
                                    <div class="d-flex justify-content-end mt-4"  >
                                        <button type="button"   class="btn btn-danger border-0 me-2">Annuler</button>
                                        <button type="submit"    class="btn btn-primary">Enregistrer</button>
                                    </div>
            
                                </form>
                                <form class="container" v-if="IframeStateButton">
                                    <div class="col-lg-12 mt-3"  v-if="manageFilesPubStoreCreateErrors.file_name">
                                        <label class="form-label" >Non du fichier</label>
                                        <input  name="file_name" v-model="file_name" type="text" class="form-control" placeholder="Veuillez entrer le nom du fichier">
                                    </div>
            
                                    <div class="col-lg-12 mt-3"  v-else>
                                        <label class="form-label" >Non du fichier</label>
                                        <input  name="file_name" v-model="file_name" type="text" class="form-control" placeholder="Veuillez entrer le nom du fichier">
                                    </div>
                                    <div class="col-lg-12 mt-3"  v-if="manageFilesPubStoreCreateErrors.file_url">
                                        <label class="form-label" >Code Iframe</label>
                                        <textarea  cols="3" rows="3" name="file_url" v-model="file_url" type="url" class="form-control"  ></textarea>
                                    </div>
            
                                    <div class="col-lg-12 mt-3"  v-else>
                                        <label class="form-label" >Code Iframe</label>
                                        <textarea  cols="3" rows="3" name="file_url" v-model="file_url" type="url" class="form-control"  ></textarea>
                                    </div>
                                    <div class="col-lg-12 mt-3"  v-if="manageFilesPubStoreCreateErrors.description_file">
                                        <label class="form-label" >Ajoutez une description au fichier</label>
                                        <input  name="description_file" v-model="description_file" type="text" class="form-control" placeholder="Veuillez décrire le fichier">
                                    </div>
            
                                    <div class="col-lg-12 mt-3"  v-else>
                                        <label class="form-label" >Ajoutez une description au fichier</label>
                                        <input  name="description_file" v-model="description_file" type="text" class="form-control" placeholder="Veuillez décrire le fichier">
                                    </div>
                                    <div class="d-flex justify-content-end mt-4"  >
                                        <button type="button"   class="btn btn-danger border-0 me-2">Annuler</button>
                                        <button type="submit"    class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                                <form v-if="UploadStateButton">
                                    <div class="container">
                                        <div class="col-lg-12 mt-3  " >
                                            <div
                                                @drop.prevent="drop"
                                                @change="selectedFile"
                                                @dragenter.prevent="toggleActive"
                                                @dragleave.prevent="toggleActive"
                                                @dragover.prevent
                
                                                :class="{ 'active-dropzone': active }"
                                                class="dropzone"
                                            >
                                                <span class="text-center">
                                                    <img :src="`/assets/images/upload.png`" style="width: 60px; height: 60px"/> <br>
                                                    Faites glisser ou déposer vos fichiers ou cliquez sur <br>
                                                    <label for="dropzoneFile" style="cursor: pointer">Selectionner les fichiers</label>
                                                    <input type="file" multiple  id="dropzoneFile" class="dropzoneFile" />
                                                </span>
                                            </div>
                                        </div> 
                                    </div> 
                                </form>
                                <form v-if="ExistStateButton">
                                    <div class="col-lg-12 mt-3  " >
            
                                    </div>
                                </form>
                                 
                            </div>
                            <!-- Chart END -->
                        </div>
                        <div class="col-xl-4">
                            <!-- Chart START -->
                            <div class="card border h-100">
            
                                <!-- Card header -->
                                <div class="card-header p-3 border-bottom">
                                    <h5 class="card-header-title mb-0">Gerer les fichiers uploadés</h5>
                                </div>
                                <!-- Card body -->
                                 <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                          <div style="position: relative; height: 250px;">
                                              <img src="https://actualitetogo.com/assets/images/empty.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                                          </div>
                                          <h5 style="text-align: center; margin-top: -50px"> Ancun fichier n'a été uploadé  pour le moment. </h5>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chart END -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermez</button> 
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="uploadPhotosCoverModalpublicationStorePublicitesCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down"> 
            <!-- Login Form -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Gestion des fichiers</h5> 
                    <button type="button" class="btn-close" @click="uploadPhotosCoverModalClose" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-7">
                            <!-- Chart START -->
                            <div class="card border h-100">
            
                                <!-- Card header -->
                                <div class="card-header p-3 border-bottom">
                                    <h5 class="card-header-title mb-0">Définir une image de couverture</h5>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                          <div style="position: relative; height: 250px;">
                                              <img src="https://actualitetogo.com/assets/images/empty.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                                          </div>
                                          <h5 style="text-align: center; margin-top: -50px"> Ancun fichier n'a été uploadé  pour le moment. </h5>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>  
                            </div>
                            <!-- Chart END -->
                        </div>
                        <div class="col-xl-5">
                            <!-- Chart START -->
                            <div class="card border h-100">
            
                                <!-- Card header -->
                                <div class="card-header p-3 border-bottom">
                                    <h5 class="card-header-title mb-0">Votre image de couverture</h5>
                                </div>
                                <!-- Card body -->
                                 <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                          <div style="position: relative; height: 250px;">
                                              <img src="https://actualitetogo.com/assets/images/empty.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                                          </div>
                                          <h5 style="text-align: center; margin-top: -50px"> Ancune image de couverture pour le moment. </h5>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chart END -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermez</button> 
                </div>
            </div>
        </div>
    </div>

</template>

<script> 

export default {

    
    data () {
        return{
            manageFilesPubStoreCreateData: {},
            manageFilesPubStoreCreateMessage: null,
            manageFilesPubStoreCreateErrors: { },
            UploadStateButton: true,
            LinkStateButton: false,
            IframeStateButton: false,
            ExistStateButton: false,
            file_name: null,
            file_url: null,
            description_file: null,
            active: false,
            dropzoneFile: [ ],
            images:[]
        }
    },

    methods:{
        toggleActive( ) {
            this.active  = !this.active ;
        },

        drop (e){
            this.dropzoneFile = event.target.files
            if(this.dropzoneFile.length === 0) return;
            for(let i = 0; i < this.dropzoneFile.length; i++){
                if(this.dropzoneFile[i].type.split("/")[0] != "image") continue;
                if(!this.images.some((e) => e.name === this.dropzoneFile[i].name)){
                    this.images.push({name: this.dropzoneFile[i].name, url: URL.createObjectURL(this.dropzoneFile[i])})
                }
            }

            console.log(this.images)
            this.active = false
        },

        selectedFile (event){
             
            this.dropzoneFile =  event.target.files
            if(this.dropzoneFile.length === 0) return;
            for(let i = 0; i < this.dropzoneFile.length; i++){
                if(this.dropzoneFile[i].type.split("/")[0] != "image") continue;
                if(!this.images.some((e) => e.name === this.dropzoneFile[i].name)){
                    this.images.push({name: this.dropzoneFile[i].name, url: URL.createObjectURL(this.dropzoneFile[i])})
                }
            }

            console.log(this.images)

            this.active = false
        },

        UploadState(){

            this.UploadStateButton = true,
            this.LinkStateButton = false,
            this.IframeStateButton = false,
            this.ExistStateButton = false

        },

        LinkState(){

            this.UploadStateButton = false,
            this.LinkStateButton = true,
            this.IframeStateButton = false,
            this.ExistStateButton = false

        },

        IframeState(){

            this.UploadStateButton = false,
            this.LinkStateButton = false,
            this.IframeStateButton = true,
            this.ExistStateButton = false

        },

        ExistState(){

            this.UploadStateButton = false,
            this.LinkStateButton = false,
            this.IframeStateButton = false,
            this.ExistStateButton = true

        },
    }

}

</script>


<style scoped  >
.dropzone {
  width: 100%;
  height: 200px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  row-gap: 16px;
  border: 2px dashed #41b883;
  background-color: #fff;
  transition: 0.3s ease all;

  label {
    padding: 8px 12px;
    color: #fff;
    background-color: #41b883;
    transition: 0.3s ease all;
  }

  input {
    display: none;
  }
}

.active-dropzone {
  color: #fff;
  border-color: #fff;
  background-color: #41b883;

  label {
    background-color: #fff;
    color: #41b883;
  }
}
</style>


