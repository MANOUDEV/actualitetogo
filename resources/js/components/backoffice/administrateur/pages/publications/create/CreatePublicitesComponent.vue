<template>
    <div class="col-lg-12 col-xxl-8">
        <!-- Profile START -->
        <div class="card border mb-4">
            <div class="card-header border-bottom p-3">
                <h5 class="card-header-title mb-0">PUBLICATION {{publicationCreate.typePublication.name}}</h5>
            </div>
            <div class="card-body"  >

                <div class="d-sm-flex justify-content-sm-between align-items-center mb-3" v-if="stepStorePublicitesFirst == true">
                    <div class="d-flex align-items-center">
                        <h5 class="card-header-title mb-0">Première étape</h5>
                    </div>
                    <div class="d-flex mt-2 mt-sm-0">
                        <div class="btn btn-primary btn-round mb-0 " @click="buttonStepStorePublicitesFirstToTwo" style="font-size: 25px">
                            <i  class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                </div>

                <div  v-if="stepStorePublicitesFirst == true">

                    <div v-if="publicationStorePublicitesFirstCreateMessage">
                        <div class="alert alert-danger"  role="alert">
                            {{ publicationStorePublicitesFirstCreateMessage }}
                        </div>
                    </div>

                    <form>
                        <div class="row" v-if="alreadyCreateFirst == false">
                            <div class="col-lg-12 mb-5">
                                <div class="row">
                                    <div class="col-lg-12 mb-3" v-if="publicationStorePublicitesFirstCreateErrors.title">
                                        <label class="form-label" >Titre de la publication</label>
                                        <QuillEditor theme="snow" v-model:content="title" contentType="html" />
                                        <div v-for="errorname in publicationStorePublicitesFirstCreateErrors.title" :key="errorname" class="invalid-feedback">
                                            {{ errorname }}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3" v-else>
                                        <label class="form-label" >Titre de la publication</label>
                                        <QuillEditor theme="snow" v-model:content="title" contentType="html" />

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3"  v-if="publicationUpdatePublicitesFirstCreateErrors.link_publicites">
                                <label class="form-label" >Ajouter le lien de la publicité</label>
                                <input  name="link_publicites" v-model="link_publicites" type="text" class="form-control" placeholder="Veuillez entrer le lien de la publicité ">
                            </div>

                            <div class="col-lg-12 mt-3"  v-else>
                                <label class="form-label" >Ajouter le lien de la publicité</label>
                                <input  name="link_publicites" v-model="link_publicites" type="text" class="form-control" placeholder="Veuillez entrer le lien de la publicité ">
                            </div>
                        </div>
                        <div class="row" v-else>
                            <div class="col-lg-12 mb-5">
                                <div class="row">
                                    <div class="col-lg-12 mb-3" v-if="publicationUpdatePublicitesFirstCreateErrors.title">
                                        <label class="form-label" >Titre de la publication</label>
                                        <QuillEditor theme="snow" v-model:content="title" contentType="html" />
                                        <div v-for="errorname in publicationUpdatePublicitesFirstCreateErrors.title" :key="errorname" class="invalid-feedback">
                                            {{ errorname }}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3" v-else>
                                        <label class="form-label" >Titre de la publication</label>
                                        <QuillEditor theme="snow" v-model:content="title" contentType="html" />

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3"  v-if="publicationUpdatePublicitesFirstCreateErrors.link_publicites">
                                <label class="form-label" >Ajouter le lien de la publicité</label>
                                <input  name="link_publicites" v-model="link_publicites" type="text" class="form-control" placeholder="Veuillez entrer le lien de la publicité  ">
                            </div>

                            <div class="col-lg-12 mt-3"  v-else>
                                <label class="form-label" >Ajouter le lien de la publicité</label>
                                <input  name="link_publicites" v-model="link_publicites" type="text" class="form-control" placeholder="Veuillez entrer le lien de la publicité  ">
                            </div>                         
                        </div>
                        <div v-if="alreadyCreateFirst === false">
                            <div class="d-flex justify-content-end mt-4" v-if="loadingPublicationStorePublicitesFirstCreate == false">
                                <button type="button" @click="cancelFirst" class="btn btn-danger border-0 me-2">Annuler</button>
                                <button type="submit"  @click="publicationStorePublicitesFirst" class="btn btn-primary">Enregistrer</button>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-else>
                                <button type="button" disabled class="btn btn-success border-0 me-2">
                                    <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>En cours de sauvegarde...</button>
                            </div>
                        </div>
                        <div v-else>
                            <div class="d-flex justify-content-end mt-4" v-if="loadingPublicationUpdatePublicitesFirstCreate == false">
                                <button type="button" @click="cancelFirst" class="btn btn-danger border-0 me-2">Annuler</button>
                                <button type="submit"  @click="publicationUpdatePublicitesFirst" class="btn btn-primary">Modifier</button>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-else>
                                <button type="button" disabled class="btn btn-success border-0 me-2">
                                    <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>Modification en cours...</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-sm-flex justify-content-sm-between align-items-center mb-3" v-if="stepStorePublicitesTwo == true">
                    <div class="d-flex align-items-center">
                        <h5 class="card-header-title mb-0">Deuxième étape </h5>

                    </div>
                    <div class="d-flex mt-2 mt-sm-0">
                        <div class="btn btn-danger btn-round mb-0 " @click="buttonStepStorePublicitesTwoToFirst" style="font-size: 25px">
                            <i  class="bi bi-arrow-left-short"></i>
                        </div> &nbsp;
                        <div class="btn btn-primary btn-round mb-0 " @click="buttonStepStorePublicitesTwoToThree" style="font-size: 25px">
                            <i  class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                </div>
                <div  v-if="stepStorePublicitesTwo == true">
                    <div class="row" >
                        <div class="col-lg-6 mb-5">
                            <div class="dropzone" >
                                <span class="text-center" @click="uploadPhotosVideosModalOpen" style="cursor: pointer">Ajoutez des photos et videos de la publicité <br> <i class="bi bi-plus-circle" style="font-size: 80px"></i></span>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="dropzone" >
                                <span>Définir une photo de couverture</span>
                                <span style="cursor: pointer" @click="uploadPhotosCoverModalOpen"><i class="bi bi-plus-circle" style="font-size: 80px"></i></span> 
                            </div>
                        </div>
                    </div>
                   
                </div>

                <div class="d-sm-flex justify-content-sm-between align-items-center" v-if="stepStorePublicitesThree == true">
                    <div class="d-flex align-items-center">
                        <h5 class="card-header-title mb-0">Troisième étape</h5>
                    </div>
                    <div class="d-flex mt-2 mt-sm-0">
                        <div class="btn btn-danger btn-round mb-0 " @click="buttonStepStorePublicitesThreeToTwo" style="font-size: 25px">
                            <i  class="bi bi-arrow-left-short"></i>
                        </div> &nbsp;
                        <div class="btn btn-primary btn-round mb-0 " @click="buttonStepStorePublicitesThreeToThree" style="font-size: 25px">
                            <i  class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                </div>

                <div v-if="stepStorePublicitesThree == true">
                   
                    <div class="row" v-if="alreadyCreateThree == false">
                        
                        <form style="margin-top: -15px">
                           
                            <div class="row mb-2">
                                
                                <div class="row g-3 g-sm-4">
                                    <div v-if="publicationStorePublicitesThreeCreateMessage">
                                        <div class="alert alert-danger"  role="alert">
                                            {{ publicationStorePublicitesThreeCreateMessage }}
                                        </div>
                                    </div>
                                    <!-- Delivery option -->
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox" v-model="entete_site" name="entete_site" id="delivery1"  >
                                                <label class="form-check-label h5 mb-0" for="delivery1">A l'entête du site</label>
                                                <p class="mb-1 small">Afficher la publicité en l'entête du site</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delivery option -->
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox"  v-model="entre_publications" name="entre_publications" id="delivery2"> 
                                                <label class="form-check-label h5 mb-0" for="delivery2">Entre les publications </label>
                                                <p class="mb-1 small">Afficher la publicité entre les publications sur la page d'accueil</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox" v-model="toutes_les_pages" name="toutes_les_pages" id="delivery3"  >
                                                <label class="form-check-label h5 mb-0" for="delivery3">Sur toutes les pages</label>
                                                <p class="mb-1 small">Afficher la publicité entre les publications sur toutes les pages</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox" v-model="dans_les_contenus" name="dans_les_contenus" id="delivery4">
                                                <label class="form-check-label h5 mb-0" for="delivery4">Dans les contenus</label>
                                                <p class="mb-1 small">Afficher la publicité à l'intérieur des contenus des publications</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <label class="form-label" >Statut de publication</label>
                                    <select class="form-select" @change="handleSelectionSearchByStatus($event)" v-model="status" name="status" id="status">
                                        <option value="1" >Publier à l'instant</option>
                                        <option value="0" >Enregistrer comme brouillon</option>
                                        <option value="2" >Programmer la publication</option>
                                        <option value="3" >Mettre en attente de validation</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mt-3" v-if="show_date_publish">
                                    <div class="mb-3" >
                                        <label class="form-label">Choisir une de date de début</label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" v-model="date_publish" />
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3" v-if="show_date_publish_end">
                                    <div class="mb-3" >
                                        <label class="form-label">Choisir une de date de fin</label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" v-model="date_publish_end" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-if="loadingPublicationStorePublicitesThreeCreate == false">
                                <button type="button" @click="cancelThree" class="btn btn-danger border-0 me-2">Annuler</button>
                                <button type="submit"  @click="publicationStorePublicitesThree" class="btn btn-primary">Enregistrer</button>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-else>
                                <button type="button" disabled class="btn btn-success border-0 me-2">
                                    <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>En cours de sauvegarde...</button>
                            </div>
                        </form>
                    </div>

                    <div class="row" v-else>
                        
                        <form style="margin-top: -15px">
                           
                            <div class="row mb-2">
                                 
                                <div class="row g-3 g-sm-4">
                                    <div v-if="publicationUpdatePublicitesThreeCreateMessage">
                                        <div class="alert alert-danger"  role="alert">
                                            {{ publicationUpdatePublicitesThreeCreateMessage }}
                                        </div>
                                    </div>
                                    <!-- Delivery option -->
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox" v-model="entete_site" name="entete_site" id="delivery1"  >
                                                <label class="form-check-label h5 mb-0" for="delivery1">A l'entête du site</label>
                                                <p class="mb-1 small">Afficher la publicité en l'entête du site</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delivery option -->
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox" v-model="entre_publications" name="entre_publications" id="delivery2"> 
                                                <label class="form-check-label h5 mb-0" for="delivery2">Entre les publications </label>
                                                <p class="mb-1 small">Afficher la publicité entre les publications sur la page d'accueil</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox" v-model="toutes_les_pages" name="toutes_les_pages" id="delivery3"  >
                                                <label class="form-check-label h5 mb-0" for="delivery3">Sur toutes les pages</label>
                                                <p class="mb-1 small">Afficher la publicité entre les publications sur toutes les pages</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="bg-light rounded-2 p-3">
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="checkbox" v-model="dans_les_contenus" name="dans_les_contenus" id="delivery4">
                                                <label class="form-check-label h5 mb-0" for="delivery4">Dans les contenus</label>
                                                <p class="mb-1 small">Afficher la publicité à l'intérieur des contenus des publications</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <label class="form-label" >Statut de publication</label>
                                    <select class="form-select" @change="handleSelectionSearchByStatus($event)" v-model="status" name="status" id="status">
                                        <option value="1" >Publier à l'instant</option>
                                        <option value="0" >Enregistrer comme brouillon</option>
                                        <option value="2" >Programmer la publication</option>
                                        <option value="3" >Mettre en attente de validation</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mt-3" v-if="show_date_publish">
                                    <div class="mb-3" >
                                        <label class="form-label">Choisir une de date de début</label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" v-model="date_publish" />
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3" v-if="show_date_publish_end">
                                    <div class="mb-3" >
                                        <label class="form-label">Choisir une de date de fin</label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" v-model="date_publish_end" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-if="loadingPublicationUpdatePublicitesThreeCreate == false">
                                <button type="button" @click="cancelThree" class="btn btn-danger border-0 me-2">Annuler</button>
                                <button type="submit"  @click="publicationUpdatePublicitesThree" class="btn btn-primary">Modifier</button>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-else>
                                <button type="button" disabled class="btn btn-success border-0 me-2">
                                    <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>Modification en cours...</button>
                            </div>
                        </form>
                    </div>

                </div>

              
            </div>

             
        </div>
    </div> 
    <div class="modal fade" id="authFormModalpublicationStorePublicitesCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">


            <!-- Login Form -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-if="authSectionStepModal == 1">Se connecter</h5>
                    <h5 class="modal-title" v-else-if="authSectionStepModal == 2">Modifier le mot de passe</h5>
                    <h5 class="modal-title" v-else-if="authSectionStepModal == 3">S'inscrire</h5>
                    <button type="button" class="btn-close" @click="authFormModalpublicationStorePublicitesCreateClose" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div v-if="authSectionStepModal == 1" style="margin-bottom: -15px">
                        <div v-if="errorLogin">
                            <div class="alert alert-danger"  role="alert">
                                {{ errorLogin }}
                            </div>
                        </div>
                        <form>
                            <!-- Email -->
                            <div class="mb-3" v-if="errorsLogin.username">
                                <label class="form-label" for="exampleInputEmailLogin">Nom d'utilisateur ou email</label>
                                <input type="text" v-model="username" name="username" class="form-control is-invalid" id="exampleInputEmailLogin" placeholder="Votre nom d'utilisateur ou votre email">
                                <div v-for="errorUsername in errorsLogin.username" :key="errorUsername" class="invalid-feedback">
                                    {{ errorUsername }}
                                </div>
                            </div>
                            <div class="mb-3" v-else>
                                <label class="form-label" for="exampleInputEmailLoginInvalid">Nom d'utilisateur ou email</label>
                                <input type="text" v-model="username" name="username" class="form-control" id="exampleInputEmailLoginInvalid" placeholder="Votre nom d'utilisateur ou votre email">
                            </div>
                            <!-- Password -->
                            <div class="mb-3" v-if="errorsLogin.password">
                                <label class="form-label" for="exampleInputPassword1">Mot de passe</label>
                                <input v-model="password" name="password" class="form-control fakepassword is-invalid" type="password" id="psw-input" placeholder="*********">
                                <div class="input-group">
                                    <input v-model="password" name="password" class="form-control fakepassword" type="password" id="psw-input" placeholder="*********">
                                    <span class="input-group-text p-0" @click="showPassword" style="cursor: pointer">
                                        <i v-if="showPsw == false" class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                                        <i v-else class="fakepasswordicon far fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                    </span>
                                </div>
                                <div class="rounded mt-1" id="psw-strength"></div>
                                <div id="exampleInputPassword1" v-for="errorPassword in errorsLogin.password" :key="errorPassword" class="invalid-feedback">
                                    {{ errorPassword }}
                                </div>
                            </div>
                            <div class="mb-3" v-else>
                                <label class="form-label"  for="exampleInputPassword1">Mot de passe</label>
                                <div class="input-group">
                                    <input v-model="password" name="password" class="form-control fakepassword" type="password" id="psw-input" placeholder="*********">
                                    <span class="input-group-text p-0" @click="showPassword" style="cursor: pointer">
                                        <i v-if="showPsw == false" class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                                        <i v-else class="fakepasswordicon far fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                    </span>
                                </div>
                                <div class="rounded mt-1" id="psw-strength"></div>
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember_me" v-model="remember_me" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                            </div>

                            <button type="button" disabled v-if="loadingLogin" class="btn btn-success mx-auto w-100"> <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                <span class="sr-only">Loading...</span>  Connexion</button>
                            <button type="submit"  @click.prevent="submitLogin" v-else class="btn btn-success mx-auto w-100">Se connecter</button>

                        </form>

                    </div>
                    <div  v-if="authSectionStepModal == 2" style="margin-bottom: -15px">
                        <h6 v-if="step === 1">Email de vérification</h6>
                        <h6 v-else-if="step === 2">Code de rénitialisation</h6>
                        <h6 v-else-if="step === 3">Nouveau mot de passe</h6>

                        <div v-if="step === 1">
                            <div v-if="errorForgotPasswordFirst" class="mb-3">
                                <div class="alert alert-danger"  role="alert">
                                    {{ errorForgotPasswordFirst }}
                                </div>
                            </div>
                            <form >
                                <div class="mb-3" v-if="errorsForgotPasswordFirst.email">
                                    <input type="email" v-model="email" name="email" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Veuillez entrer votre email">
                                    <div v-for="errorForgotPasswordemail in errorsForgotPasswordFirst.email" :key="errorForgotPasswordemail" class="invalid-feedback">
                                        {{ errorForgotPasswordemail }}
                                    </div>
                                </div>
                                <div class="mb-3" v-else>
                                    <input type="email" v-model="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Veuillez entrer votre email">
                                </div>
                                <!-- Button -->
                                <button type="button" disabled v-if="loadingForgotPasswordFirst" class="btn btn-success  mx-auto w-100"> <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>Vérification</button>
                                <button type="submit" @click.prevent="submitVerifyForgotPasswordEmail" v-else class="btn btn-success  mx-auto w-100">Vérifier</button>
                            </form>
                        </div>
                        <div v-if="step === 2">
                            <div v-if="errorForgotPasswordTwo" class="mb-3">

                                <div class="alert alert-danger"  role="alert">
                                    {{ errorForgotPasswordTwo }}
                                </div>
                            </div>
                            <form>
                                <div class="mb-3" v-if="errorsForgotPasswordTwo.otp">

                                    <input type="text" v-model="otp" name="otp" class="form-control is-invalid" id="exampleInputOtp1" placeholder="Veuillez entrer votre code de vérification">
                                    <div v-for="errorForgotPasswordOtp in errorsForgotPasswordTwo.otp" :key="errorForgotPasswordOtp" class="invalid-feedback">
                                        {{ errorForgotPasswordOtp }}
                                    </div>
                                </div>
                                <div class="mb-3" v-else>

                                    <input type="text"  v-model="otp" name="otp" class="form-control" id="exampleInputOtp1" placeholder="Veuillez entrer votre code de vérification">
                                </div>
                                <div class="mb-3" v-if="loadingResendOTP">
                                    <span for="exampleInputOtp1"><span style="color: blue; cursor:pointer">Renvoie d'un nouveau code en cours ... </span></span>
                                </div>
                                <div class="mb-3" v-if="!loadingResendOTP">
                                    <span for="exampleInputOtp1" @click.prevent="submitResendOtp"><span style="color: blue; cursor:pointer">Renvoyer un nouveau code </span></span>
                                </div>
                                <div class="row" v-if="loadingForgotPasswordTwo">
                                    <div class="col-md-12">
                                        <button type="button" disabled class="btn btn-success  mx-auto w-100"> <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                            <span class="sr-only">Loading...</span>Validation
                                        </button>
                                    </div>
                                </div>
                                <div class="row" v-else>
                                    <div class="col-md-6">
                                        <span><span class="btn btn-primary  mx-auto w-100" @click="PreviousForgotPasswordStep"><i class="bi bi-arrow-left-short"></i>Retour</span></span>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" @click.prevent="submitVerifyForgotPasswordOtp" class="btn btn-success  mx-auto w-100">Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div v-if="step === 3">
                            <div v-if="errorForgotPasswordThree" class="mb-3">
                                <div class="alert alert-danger"  role="alert">
                                    {{ errorForgotPasswordThree }}
                                </div>
                            </div>
                            <form>
                                <div class="mb-3" v-if="errorsForgotPasswordThree.password">
                                    <label class="form-label" for="exampleInputpassword1">Votre nouveau mot de passe</label>
                                    <div class="input-group">
                                        <input v-model="password" name="password" class="form-control fakepassword is-invalid" type="password" id="psw-input" placeholder="Veuillez entrer votre nouveau mot de passe">
                                        <span class="input-group-text p-0" @click="showPassword" style="cursor: pointer">
                                            <i v-if="showPsw == false" class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                                            <i v-else class="fakepasswordicon far fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                        </span>
                                    </div>
                                    <div class="rounded mt-1" id="psw-strength"></div>
                                    <div id="exampleInputpassword1" v-for="errorpassword in errorsForgotPasswordThree.password" :key="errorpassword" class="invalid-feedback">
                                        {{ errorpassword }}
                                    </div>
                                </div>
                                <div class="mb-3" v-else>
                                    <label class="form-label" for="exampleInputpassword1">Votre nouveau mot de passe</label>
                                    <div class="input-group">
                                        <input v-model="password" name="password" class="form-control fakepassword" type="password" id="psw-input" placeholder="Veuillez entrer votre nouveau mot de passe">
                                        <span class="input-group-text p-0" @click="showPassword" style="cursor: pointer">
                                            <i v-if="showPsw == false" class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                                            <i v-else class="fakepasswordicon far fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                        </span>
                                    </div>
                                    <div class="rounded mt-1" id="psw-strength"></div>
                                </div>

                                <div class="mb-3" v-if="errorsForgotPasswordThree.password_confirm">
                                    <label class="form-label" for="exampleInputpassword1">Confirmer le mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" v-model="password_confirm" class="form-control fakepassword is-invalid"  name="password_confirm"  id="psw-input_c" placeholder="Veuillez confirmer le mot de passe">
                                        <span class="input-group-text p-0" @click="showPasswordC" style="cursor: pointer">
                                            <i v-if="showPsw == false" class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                                            <i v-else class="fakepasswordicon far fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                        </span>
                                    </div>
                                    <div class="rounded mt-1" id="psw-strength"></div>
                                    <div id="exampleInputpassword1" v-for="errorpassword_confirm in errorsForgotPasswordThree.password_confirm" :key="errorpassword_confirm" class="invalid-feedback">
                                        {{ errorpassword_confirm }}
                                    </div>
                                </div>
                                <div class="mb-3" v-else>
                                    <label class="form-label" for="exampleInputpassword1">Confirmer le mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" v-model="password_confirm" class="form-control fakepassword"  name="password_confirm"  id="psw-input_c" placeholder="Veuillez confirmer le mot de passe">
                                        <span class="input-group-text p-0" @click="showPasswordC" style="cursor: pointer">
                                            <i v-if="showPsw == false" class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                                            <i v-else class="fakepasswordicon far fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                        </span>
                                    </div>
                                    <div class="rounded mt-1" id="psw-strength"></div>
                                </div>
                                <div class="row" v-else>
                                    <div class="col-md-6">
                                        <span><span class="btn btn-primary  mx-auto w-100" @click="PreviousHForgotPasswordStep"><i class="bi bi-arrow-left-short"></i>Retour</span></span>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" @click.prevent="submitForgotPasswordNewPass" class="btn btn-success  mx-auto w-100">Modifier</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                </div>
                <div v-if="authSectionStepModal == 2" style="margin-top: -15px">
                    <p class="text-center"><span @click="changeAuthSectionStepModalToLogin" style="cursor: pointer; color: blue"> Se connecter</span></p>
                </div>
                <div v-else-if="authSectionStepModal == 1" style="margin-top: -15px">
                    <p class="text-center"><span @click="changeAuthSectionStepModalToForgotPassword" style="cursor: pointer; color: blue"> Mot de passe oublié ?</span></p>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
import { mapGetters, mapActions} from "vuex";
import moment from 'moment'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
  
export default {

    components: {
        QuillEditor 
    },

    props: {
        publicationCreate: null,
    },

    data () {
        return {
            meRoleName: null,
            publicationCreateBySlugTypeShowData: {},
            publicationCreateBySlugTypeShowMessage: null,
            meProfileUserName: null,
            meProfileRoleName: null,
            authSectionModal: 'CREATEPUBLICITEFIRST',
            publicationStorePublicitesFirstCreateData: {
                publicationCreateData:{
                    slug: "null"
                }
            },
            publicationStorePublicitesFirstCreateMessage: null,
            publicationStorePublicitesFirstCreateErrors: { }, 
            publicationUpdatePublicitesFirstCreateData: {},
            publicationUpdatePublicitesFirstCreateMessage: null,
            publicationUpdatePublicitesFirstCreateErrors: { }, 
            publicationStorePublicitesThreeCreateMessage: null,
            publicationStorePublicitesThreeCreateErrors: { }, 
            publicationUpdatePublicitesThreeCreateData: {},
            publicationUpdatePublicitesThreeCreateMessage: null,
            publicationUpdatePublicitesThreeCreateErrors: { },  
            username: null,
            email:null,
            password: null,
            password_confirm: null,
            loadingLogin: false,
            errorLogin: false,
            errorsLogin: [],
            loadingConnect: false,
            remember_me: false,
            authSectionStepModal: 1,
            loadingForgotPasswordFirst: false,
            errorForgotPasswordFirst: false,
            errorsForgotPasswordFirst: [],
            loadingForgotPasswordTwo: false,
            errorForgotPasswordTwo: false,
            errorsForgotPasswordTwo: [],
            loadingForgotPasswordThree: false,
            errorForgotPasswordThree: false,
            errorsForgotPasswordThree: [],
            step: 1,
            name: null,
            slug: null,
            loadingCreate: false,
            status: 1,
            title: null,
            link_publicites: null, 
            date_publish: null,
            date_publish_end: null,
            entete_site: false,
            dans_les_contenus: false,
            entre_publications: true,
            toutes_les_pages: true,
            show_date_publish: false,
            show_date_publish_end: true,
            showPsw: false,
            showPswC: false,
            loadingPublicationStorePublicitesFirstCreate: false,
            loadingPublicationUpdatePublicitesFirstCreate: false,
            loadingPublicationStorePublicitesThreeCreate: false,
            loadingPublicationUpdatePublicitesThreeCreate: false,
            alreadyCreateFirst: false, 
            alreadyCreateThree: false, 
            config: {
                events: {
                    initialized: function () {
                    console.log('initialized')
                    }
                }
            }, 
            stepStorePublicitesFirst: true,
            stepStorePublicitesTwo: false,
            stepStorePublicitesThree: false,
             
        }
    },
    computed: {
        ...mapGetters("roleSecurity",{
            gettersMeRoleName:"getMeRoleName",
            gettersRoleStatus:'getRoleStatus',
        }),

        ...mapGetters('publicationAdmin',{
            getterInfosPublicationCreateBySlugTypeShowStatus:'getInfosPublicationCreateBySlugTypeShowStatus',
            getterInfosPublicationCreateBySlugTypeShowMessage:'getInfosPublicationCreateBySlugTypeShowMessage',
            getterInfosPublicationCreateBySlugTypeShowData:'getInfosPublicationCreateBySlugTypeShowData',
        }),

        ...mapGetters('storePublicitesAdmin',{ 
            getterInfosPublicationStorePublicitesFirstStatus:'getInfosPublicationStorePublicitesFirstStatus',
            getterInfosPublicationStorePublicitesFirstMessage:'getInfosPublicationStorePublicitesFirstMessage',
            getterInfosPublicationStorePublicitesFirstData:'getInfosPublicationStorePublicitesFirstData',
            getterInfosPublicationStorePublicitesFirstErrors:'getInfosPublicationStorePublicitesFirstErrors', 
            getterInfosPublicationUpdatePublicitesFirstStatus:'getInfosPublicationUpdatePublicitesFirstStatus',
            getterInfosPublicationUpdatePublicitesFirstMessage:'getInfosPublicationUpdatePublicitesFirstMessage',
            getterInfosPublicationUpdatePublicitesFirstData:'getInfosPublicationUpdatePublicitesFirstData',
            getterInfosPublicationUpdatePublicitesFirstErrors:'getInfosPublicationUpdatePublicitesFirstErrors', 
            getterInfosPublicationStorePublicitesThreeStatus:'getInfosPublicationStorePublicitesThreeStatus',
            getterInfosPublicationStorePublicitesThreeMessage:'getInfosPublicationStorePublicitesThreeMessage',
            getterInfosPublicationStorePublicitesThreeData:'getInfosPublicationStorePublicitesThreeData',
            getterInfosPublicationStorePublicitesThreeErrors:'getInfosPublicationStorePublicitesThreeErrors', 
            getterInfosPublicationUpdatePublicitesThreeStatus:'getInfosPublicationUpdatePublicitesThreeStatus',
            getterInfosPublicationUpdatePublicitesThreeMessage:'getInfosPublicationUpdatePublicitesThreeMessage',
            getterInfosPublicationUpdatePublicitesThreeData:'getInfosPublicationUpdatePublicitesThreeData',
            getterInfosPublicationUpdatePublicitesThreeErrors:'getInfosPublicationUpdatePublicitesThreeErrors', 
        }),
        
        ...mapGetters('login',{
            getterLoginStatus:'getLoginStatus',
            getterLoginMessage:'getLoginMessage',
            getterLoginErrors:'getLoginErrors',
        }),

        ...mapGetters("meProfile",{
            gettersMeProfileUserName:"getMeProfileUserName",
            gettersMeProfileRoleName:"getMeProfileRoleName",
            gettersProfileStatus:'getProfileStatus',
        }),

        ...mapGetters("forgot_password",{
            gettersSendOtpForgotPasswordStatus:'getSendOtpForgotPasswordStatus',
            gettersSendOtpForgotPasswordErrors:'getSendOtpForgotPasswordErrors',
            gettersSendOtpForgotPasswordMessage:'getSendOtpForgotPasswordMessage',
            gettersCheckOtpForgotPasswordStatus:'getCheckOtpForgotPasswordStatus',
            gettersCheckOtpForgotPasswordErrors:'getCheckOtpForgotPasswordErrors',
            gettersCheckOtpForgotPasswordMessage:'getCheckOtpForgotPasswordMessage',
            gettersNewPassOtpForgotPasswordStatus:'getNewPassOtpForgotPasswordStatus',
            gettersNewPassOtpForgotPasswordErrors:'getNewPassOtpForgotPasswordErrors',
            gettersNewPassOtpForgotPasswordMessage:'getNewPassOtpForgotPasswordMessage',
        }),

    },
    methods:{

        ...mapActions('login',{
            actionLogin:'login'
        }),

        ...mapActions("meProfile",{
            actionsGetMeProfile:'getMeProfile'
        }),

        ...mapActions("forgot_password",{
            actionsSendOtpForgotPassword:'sendOtpForgotPassword',
            actionsCheckOtpForgotPassword:'checkOtpForgotPassword',
            actionsNewPassOtpForgotPassword:'newPassOtpForgotPassword'
        }),

        ...mapActions("register",{
            actionsSendOtpRegister:'sendOtpRegister',
            actionsCheckOtpRegister:'checkOtpRegister',
            actionsNewInfoOtpRegister:'newInfoOtpRegister',
            actionsNewPassOtpRegister:'newPassOtpRegister'
        }),

        ...mapActions("roleSecurity",{
          actionsGetMeRole:'getMeRole'
        }),

 
        ...mapActions("publicationAdmin",{
          actionsPublicationCreateBySlugTypeShowDataRequest:'publicationCreateBySlugTypeShowDataRequest', 
        }), 

        ...mapActions("storePublicitesAdmin",{ 
          actionsPublicationStorePublicitesFirstDataRequest:'publicationStorePublicitesFirstDataRequest', 
          actionsPublicationUpdatePublicitesFirstDataRequest:'publicationUpdatePublicitesFirstDataRequest', 
          actionsPublicationStorePublicitesThreeDataRequest:'publicationStorePublicitesThreeDataRequest', 
          actionsPublicationUpdatePublicitesThreeDataRequest:'publicationUpdatePublicitesThreeDataRequest', 
        }), 

        buttonStepStorePublicitesFirstToTwo ( ){

            this.stepStorePublicitesFirst = false

            this.stepStorePublicitesTwo = true

            this.stepStorePublicitesThree = false

        },

        buttonStepStorePublicitesTwoToThree ( ){

            this.stepStorePublicitesFirst = false

            this.stepStorePublicitesTwo = false

            this.stepStorePublicitesThree = true

        },

       
        

        buttonStepStorePublicitesThreeToTwo ( ){

            this.stepStorePublicitesFirst = false

            this.stepStorePublicitesTwo = true

            this.stepStorePublicitesThree = false

        },

        buttonStepStorePublicitesTwoToFirst ( ){

            this.stepStorePublicitesFirst = true

            this.stepStorePublicitesTwo = false

            this.stepStorePublicitesThree = false

        },

        async handleSelectionSearchByStatus(event ){

            this.status = event.target.value

            if(this.status == 2){

                this.show_date_publish = true

                this.show_date_publish_end = true

                const date = new Date()

                this.date_publish = date.toISOString().slice(0, 16)
            }else{

                this.show_date_publish = false

                if(this.status == 0 || this.status ==3 ){

                    this.show_date_publish_end = false

                }else{

                    this.show_date_publish_end = true

                }

            }


        },

        showPassword(){
            var x = document.getElementById("psw-input");
            if (x.type === "password") {
                x.type = "text";
                this.showPsw = true
            } else {
                x.type = "password";
                this.showPsw = false
            }
        },

        showPasswordC(){
            var x = document.getElementById("psw-input_c");
            if (x.type === "password") {
                x.type = "text";
                this.showPsw = true
            } else {
                x.type = "password";
                this.showPsw = false
            }
        },

        authFormModalpublicationStorePublicitesCreateClose(){
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            this.errorForgotPasswordTwo = null
            this.errorsForgotPasswordTwo = []
            this.errorForgotPasswordThree = null
            this.errorsForgotPasswordThree = []
            this.errorLogin = false
            this.errorsLogin = []
            $('#authFormModalpublicationStorePublicitesCreate').modal('hide');
        },


        authModalClick(action_auth="LIST", name=null, slug=null){

            if(localStorage.getItem('remember_me') == "true" && localStorage.getItem('username') && localStorage.getItem('password')){

                this.username = localStorage.getItem('username')

                this.password = localStorage.getItem('password')

                this.remember_me = localStorage.getItem('remember_me')
            }

            this.name = name

            this.slug = slug

            this.authSectionModal= action_auth

            if(this.authSectionModal == "CREATEPUBLICITEFIRST"){

                this.loadingPublicationStorePublicitesFirstCreate = false

            }else if(this.authSectionModal == "UPDATEPUBLICITEFIRST"){

                this.loadingPublicationUpdatePublicitesFirstCreate = false

            }else if(this.authSectionModal == "CREATEPUBLICITETHREE"){

                this.loadingPublicationStorePublicitesThreeCreate = false

            }else if(this.authSectionModal == "UPDATEPUBLICITETHREE"){

                this.loadingPublicationUpdatePublicitesThreeCreate = false

            }

            $('#authFormModalpublicationStorePublicitesCreate').modal('show');

            
        },

        uploadPhotosVideosModalOpen(){ 
            
            $('#uploadPhotosVideosModalpublicationStorePublicitesCreate').modal('show'); 

        },

        uploadPhotosVideosModalClose(){ 
            
            $('#uploadPhotosVideosModalpublicationStorePublicitesCreate').modal('hidden'); 

        },

        uploadPhotosCoverModalOpen(){ 
            
            $('#uploadPhotosCoverModalpublicationStorePublicitesCreate').modal('show'); 

        },

        uploadPhotosCoverModalClose(){ 
            
            $('#uploadPhotosCoverModalpublicationStorePublicitesCreate').modal('hidden'); 

        },

        PreviousForgotPasswordStep(){
            this.step = 1
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            this.errorForgotPasswordTwo = null
            this.errorsForgotPasswordTwo = []
            this.errorForgotPasswordThree = null
            this.errorsForgotPasswordThree = []
            this.errorLogin = false
            this.errorsLogin = []
        },

        PreviousHForgotPasswordStep(){
            this.step = 2
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            this.errorForgotPasswordTwo = null
            this.errorsForgotPasswordTwo = []
            this.errorForgotPasswordThree = null
            this.errorsForgotPasswordThree = []
            this.errorLogin = false
            this.errorsLogin = []
        },

        changeAuthSectionStepModalToForgotPassword(){
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            this.errorForgotPasswordTwo = null
            this.errorsForgotPasswordTwo = []
            this.errorForgotPasswordThree = null
            this.errorsForgotPasswordThree = []
            this.errorLogin = false
            this.errorsLogin = []
            this.authSectionStepModal = 2
        },

        changeAuthSectionStepModalToLogin(){
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            this.errorForgotPasswordTwo = null
            this.errorsForgotPasswordTwo = []
            this.errorForgotPasswordThree = null
            this.errorsForgotPasswordThree = []
            this.errorLogin = false
            this.errorsLogin = []
            this.authSectionStepModal = 1
        },

        async submitVerifyForgotPasswordEmail(){
            this.loadingForgotPasswordFirst = true
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            await this.actionsSendOtpForgotPassword({email:this.email});

            if(this.gettersSendOtpForgotPasswordStatus === 'success'){

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.gettersSendOtpForgotPasswordMessage
                })

                this.errorForgotPasswordFirst = null
                this.errorsForgotPasswordFirst = []

                this.loadingForgotPasswordFirst = false

                this.step = 2

            }else if(this.gettersSendOtpForgotPasswordStatus === 'failed'){

                this.errorsForgotPasswordFirst = this.gettersSendOtpForgotPasswordMessage

                this.errorsForgotPasswordFirst = []

                this.loadingForgotPasswordFirst = false

            }else if(this.gettersSendOtpForgotPasswordStatus === 'error'){

                this.errorForgotPasswordFirst = this.gettersSendOtpForgotPasswordMessage

                this.errorsForgotPasswordFirst = this.gettersSendOtpForgotPasswordErrors

                this.loadingForgotPasswordFirst = false
            }

            this.loadingForgotPasswordFirst = false
        },

        async submitResendOtp(){
            this.loadingResendOTP = true
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            await this.actionsSendOtpForgotPassword({email:this.email});

            if(this.gettersSendOtpForgotPasswordStatus === 'success'){

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.gettersSendOtpForgotPasswordMessage
                })

                this.errorForgotPasswordFirst = null
                this.errorsForgotPasswordFirst = []

                this.loadingResendOTP = false

                this.step = 2

            }else if(this.gettersSendOtpForgotPasswordStatus === 'failed'){

                this.errorForgotPasswordFirst = this.gettersSendOtpForgotPasswordMessage

                this.errorsForgotPasswordFirst = []

                this.loadingResendOTP = false

            }else if(this.gettersSendOtpForgotPasswordStatus === 'error'){

                this.errorForgotPasswordFirst = this.gettersSendOtpForgotPasswordMessage

                this.errorsForgotPasswordFirst = this.gettersSendOtpForgotPasswordErrors

                this.loadingResendOTP = false
            }

            this.loadingResendOTP = false
        },

        async submitVerifyForgotPasswordOtp(){
            this.loadingForgotPasswordTwo = true
            this.errorForgotPasswordTwo = null
            this.errorsForgotPasswordTwo = []
            await this.actionsCheckOtpForgotPassword({email:this.email, otp :this.otp });

            if(this.gettersCheckOtpForgotPasswordStatus === 'success'){

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.gettersCheckOtpForgotPasswordMessage
                })

                this.errorForgotPasswordTwo = null
                this.errorsForgotPasswordTwo = []

                this.loadingForgotPasswordTwo = false

                this.step = 3

            }else if(this.gettersCheckOtpForgotPasswordStatus === 'failed'){

                this.errorForgotPasswordTwo = this.gettersCheckOtpForgotPasswordMessage

                this.errorsForgotPasswordTwo = []

                this.loadingForgotPasswordTwo = false

            }else if(this.gettersCheckOtpForgotPasswordStatus === 'error'){

                this.errorForgotPasswordTwo = this.gettersCheckOtpForgotPasswordMessage

                this.errorsForgotPasswordTwo = this.gettersCheckOtpForgotPasswordErrors

                this.loadingForgotPasswordTwo = false
            }
            this.loadingForgotPasswordTwo = false
        },

        async submitForgotPasswordNewPass(){
            this.loadingForgotPasswordThree = true
            this.errorForgotPasswordThree = null
            this.errorsForgotPasswordThree = []
            await this.actionsNewPassOtpForgotPassword({email:this.email, otp :this.otp, password :this.password ,password_confirm :this.password_confirm});

            if(this.gettersNewPassOtpForgotPasswordStatus === 'success'){

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.gettersNewPassOtpForgotPasswordMessage
                })

                this.errorForgotPasswordThree = null
                this.errorsForgotPasswordThree = []

                this.authSectionStepModal = 1

            }else if(this.gettersNewPassOtpForgotPasswordStatus === 'failed'){

                this.errorForgotPasswordThree = this.gettersNewPassOtpForgotPasswordMessage

                this.errorsForgotPasswordThree = []

                this.loadingForgotPasswordThree = false

            }else if(this.gettersNewPassOtpForgotPasswordStatus === 'error'){

                this.errorForgotPasswordThree = this.gettersNewPassOtpForgotPasswordMessage

                this.errorsForgotPasswordThree = this.gettersNewPassOtpForgotPasswordErrors

                this.loadingForgotPasswordThree = false
            }
            this.loadingForgotPasswordThree = false

        },

        async submitLogin(){
            this.loadingLogin = true
            this.errorLogin = false
            this.errorsLogin = []
            await this.actionLogin({username:this.username, password:this.password, remember_me: this.remember_me});

            if(this.getterLoginStatus === 'success admin'){

                this.errorLogin = false
                this.errorsLogin = []

                if(this.remember_me){

                    localStorage.setItem('username', this.username )

                    localStorage.setItem('password', this.password)

                    localStorage.setItem('remember_me', true)

                    this.loadingLogin = false

                    const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', this.$swal.stopTimer)
                            toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: this.getterLoginMessage
                    })



                    if(this.authSectionModal== 'CREATEPUBLICITEFIRST'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationStorePublicitesFirstCreate = true

                        this.publicationStorePublicitesFirstCreate()

                    }else if(this.authSectionModal== 'UPDATEPUBLICITEFIRST'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationUpdatePublicitesFirstCreate = true

                        this.publicationUpdatePublicitesFirstCreate()

                    }else  if(this.authSectionModal== 'CREATEPUBLICITETHREE'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationStorePublicitesThreeCreate = true

                        this.publicationStorePublicitesThreeCreate()

                    }else if(this.authSectionModal== 'UPDATEPUBLICITETHREE'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationUpdatePublicitesThreeCreate = true

                        this.publicationUpdatePublicitesThreeCreate()
                    }


                }else{

                    localStorage.setItem('remember_me', false)

                    this.loadingLogin = false

                    const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', this.$swal.stopTimer)
                            toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: this.getterLoginMessage
                    })

                    if(this.authSectionModal== 'CREATEPUBLICITEFIRST'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationStorePublicitesFirstCreate = true

                        this.publicationStorePublicitesFirstCreate()

                    }else if(this.authSectionModal== 'UPDATEPUBLICITEFIRST'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationUpdatePublicitesFirstCreate = true

                        this.publicationUpdatePublicitesFirstCreate()

                    }else  if(this.authSectionModal== 'CREATEPUBLICITETHREE'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationStorePublicitesThreeCreate = true

                        this.publicationStorePublicitesThreeCreate()

                    }else if(this.authSectionModal== 'UPDATEPUBLICITETHREE'){ 
                        
                        this.authFormModalpublicationStorePublicitesCreateClose()

                        this.loadingPublicationUpdatePublicitesThreeCreate = true

                        this.publicationUpdatePublicitesThreeCreate()
                    }
                }

            }else if(this.getterLoginStatus === 'success pub'){

                if(this.remember_me){

                    localStorage.setItem('username', this.username )

                    localStorage.setItem('password', this.password)

                    localStorage.setItem('remember_me', true)

                    this.loadingLogin = false

                    window.location = '/pub/dashboard'


                }else{

                    localStorage.setItem('remember_me', false)

                    this.loadingLogin = false

                    window.location = '/pub/dashboard'
                }



            }else if(this.getterLoginStatus === 'success visitor'){

                if(this.remember_me){

                    localStorage.setItem('username', this.username )

                    localStorage.setItem('password', this.password)

                    localStorage.setItem('remember_me', true)

                    this.loadingLogin = false

                    window.location = '/'


                }else{

                    localStorage.setItem('remember_me', false)

                    this.loadingLogin = false

                    window.location = '/'
                }



            }else if(this.getterLoginStatus === 'failed'){

                this.errorLogin = this.getterLoginMessage

                this.errorsLogin = []

                this.loadingLogin = false

            }else if(this.getterLoginStatus === 'error'){

                this.errorLogin = this.getterLoginMessage

                this.errorsLogin = this.getterLoginErrors

                this.loadingLogin = false
            }
        },

        
        cancelFirst(){
            this.title = null,
            this.link_publicites = null, 
            this.alreadyCreateFirst = false;
        },

        cancelThree(){
            this.entete_site = false
            this.dans_les_contenus = false
            this.toutes_les_pages = true
            this.entre_publications = true
            this.status = 1,
            this.date_publish = null
            this.show_date_publish = false
            this.show_date_publish_end = true
            this.alreadyCreateThree = false;
        },

        async publicationStorePublicitesFirst(){

            this.loadingPublicationStorePublicitesFirstCreate = true

            this.authSectionModal= 'CREATEPUBLICITEFIRST'

            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationStorePublicitesFirstCreate()

                    }else{

                        this.authModalClick('CREATEPUBLICITEFIRST')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('CREATEPUBLICITEFIRST')
                }

            }else{

                this.authModalClick('CREATEPUBLICITEFIRST')

            }

        },

        async publicationStorePublicitesFirstCreate(){

            this.loadingPublicationStorePublicitesFirstCreate = true

            this.authSectionModal= 'CREATEPUBLICITEFIRST'

            this.publicationStorePublicitesFirstCreateMessage =  null
            this.publicationStorePublicitesFirstCreateErrors = []

            if(this.status == 1){
                const date = new Date()

                this.date_publish = date.toISOString().slice(0, 16)
            }

            await this.actionsPublicationStorePublicitesFirstDataRequest({ slug : this.$route.params.slug, title : this.title,  link_publicites : this.link_publicites  });

            if( this.getterInfosPublicationStorePublicitesFirstStatus ==="success"){

                this.publicationStorePublicitesFirstCreateData = this.getterInfosPublicationStorePublicitesFirstData

                this.publicationStorePublicitesFirstCreateMessage =  null
                this.publicationStorePublicitesFirstCreateErrors = []
                 

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.getterInfosPublicationStorePublicitesFirstMessage
                })

                this.loadingPublicationStorePublicitesFirstCreate = false

                this.publicationStorePublicitesFirstCreateMessage =  null
                this.publicationStorePublicitesFirstCreateErrors = []

                this.publicationStorePublicitesFirstCreateData = this.getterInfosPublicationStorePublicitesFirstData

                this.alreadyCreateFirst = true;

            }else if( this.getterInfosPublicationStorePublicitesFirstStatus ==="empty"){

                this.publicationStorePublicitesFirstCreateMessage = this.getterInfosPublicationStorePublicitesFirstMessage

                this.publicationStorePublicitesFirstCreateErrors = this.getterInfosPublicationStorePublicitesFirstErrors

                this.loadingPublicationStorePublicitesFirstCreate = false


            }else if( this.getterInfosPublicationStorePublicitesFirstStatus ==="error"){

                this.publicationStorePublicitesFirstCreateMessage = this.getterInfosPublicationStorePublicitesFirstMessage

                this.publicationStorePublicitesFirstCreateErrors = []

                this.loadingPublicationStorePublicitesFirstCreate = false

            }
        },

         async publicationUpdatePublicitesFirst(){

            this.loadingPublicationUpdatePublicitesFirstCreate = true

            this.authSectionModal= 'UPDATEPUBLICITEFIRST'

            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationUpdatePublicitesFirstCreate()

                    }else{

                        this.authModalClick('UPDATEPUBLICITEFIRST')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('UPDATEPUBLICITEFIRST')
                }

            }else{

                this.authModalClick('UPDATEPUBLICITEFIRST')

            }

        },

        async publicationUpdatePublicitesFirstCreate(){

            this.loadingPublicationUpdatePublicitesFirstCreate = true

            this.authSectionModal= 'UPDATEPUBLICITEFIRST'

            this.publicationUpdatePublicitesFirstCreateMessage =  null
            this.publicationUpdatePublicitesFirstCreateErrors = []

            if(this.status == 1){
                const date = new Date()

                this.date_publish = date.toISOString().slice(0, 16)
            }

            await this.actionsPublicationUpdatePublicitesFirstDataRequest({ slug : this.$route.params.slug, title : this.title, publication_slug :  this.publicationStorePublicitesFirstCreateData.publicationCreateData.slug,  link_publicites : this.link_publicites  });

            if( this.getterInfosPublicationUpdatePublicitesFirstStatus ==="success"){

                this.publicationUpdatePublicitesFirstCreateData = this.getterInfosPublicationUpdatePublicitesFirstData

                this.publicationUpdatePublicitesFirstCreateMessage =  null
                this.publicationUpdatePublicitesFirstCreateErrors = []
                 

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.getterInfosPublicationUpdatePublicitesFirstMessage
                })

                this.loadingPublicationUpdatePublicitesFirstCreate = false

                this.publicationUpdatePublicitesFirstCreateMessage =  null
                this.publicationUpdatePublicitesFirstCreateErrors = []

                this.publicationStorePublicitesFirstCreateData = this.getterInfosPublicationUpdatePublicitesFirstData

                this.alreadyCreateFirst = true;
 
            }else if( this.getterInfosPublicationUpdatePublicitesFirstStatus ==="empty"){

                this.publicationUpdatePublicitesFirstCreateMessage = this.getterInfosPublicationUpdatePublicitesFirstMessage

                this.publicationUpdatePublicitesFirstCreateErrors = this.getterInfosPublicationUpdatePublicitesFirstErrors

                this.loadingPublicationUpdatePublicitesFirstCreate = false


            }else if( this.getterInfosPublicationUpdatePublicitesFirstStatus ==="error"){

                this.publicationUpdatePublicitesFirstCreateMessage = this.getterInfosPublicationUpdatePublicitesFirstMessage

                this.publicationUpdatePublicitesFirstCreateErrors = []

                this.loadingPublicationUpdatePublicitesFirstCreate = false

            }
        },

        async publicationStorePublicitesThree(){

            this.loadingPublicationStorePublicitesThreeCreate = true

            this.authSectionModal= 'CREATEPUBLICITETHREE'


            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationStorePublicitesThreeCreate()

                    }else{

                        this.authModalClick('CREATEPUBLICITETHREE')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('CREATEPUBLICITETHREE')
                }

            }else{

                this.authModalClick('CREATEPUBLICITETHREE')

            }

        },

        async publicationStorePublicitesThreeCreate(){

            this.loadingPublicationStorePublicitesThreeCreate = true

            this.authSectionModal= 'CREATEPUBLICITETHREE'

            this.publicationStorePublicitesThreeCreateMessage =  null
            this.publicationStorePublicitesThreeCreateErrors = []

            if(this.status == 1){
                const date = new Date()

                this.date_publish = date.toISOString().slice(0, 16)
            }

            if( this.publicationStorePublicitesFirstCreateData == [] ){
                this.publicationStorePublicitesFirstCreateData.publicationCreateData.slug = 'null'
            } 

            await this.actionsPublicationStorePublicitesThreeDataRequest({ slug : this.$route.params.slug, title : this.title, publication_slug :  this.publicationStorePublicitesFirstCreateData.publicationCreateData.slug,  link_publicites : this.link_publicites, status:  this.status, date_publish : this.date_publish, date_publish_end : this.date_publish_end, entete_site : this.entete_site, dans_les_contenus : this.dans_les_contenus, toutes_les_pages : this.toutes_les_pages, entre_publications : this.entre_publications });

            if( this.getterInfosPublicationStorePublicitesThreeStatus ==="success"){

                this.publicationStorePublicitesFirstCreateData = this.getterInfosPublicationStorePublicitesThreeData

                this.publicationStorePublicitesThreeCreateMessage =  null
                this.publicationStorePublicitesThreeCreateErrors = []
                 

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.getterInfosPublicationStorePublicitesThreeMessage
                })

                this.loadingPublicationStorePublicitesThreeCreate = false

                this.publicationStorePublicitesThreeCreateMessage =  null
                this.publicationStorePublicitesThreeCreateErrors = []

                this.publicationStorePublicitesThreeCreateData = this.getterInfosPublicationStorePublicitesThreeData

                this.alreadyCreateThree = true;

            }else if( this.getterInfosPublicationStorePublicitesThreeStatus ==="empty"){

                this.publicationStorePublicitesThreeCreateMessage = this.getterInfosPublicationStorePublicitesThreeMessage

                this.publicationStorePublicitesThreeCreateErrors = this.getterInfosPublicationStorePublicitesThreeErrors

                this.loadingPublicationStorePublicitesThreeCreate = false


            }else if( this.getterInfosPublicationStorePublicitesThreeStatus ==="error"){

                this.publicationStorePublicitesThreeCreateMessage = this.getterInfosPublicationStorePublicitesThreeMessage

                this.publicationStorePublicitesThreeCreateErrors = []

                this.loadingPublicationStorePublicitesThreeCreate = false

            }
        },

         async publicationUpdatePublicitesThree(){

            this.loadingPublicationUpdatePublicitesThreeCreate = true

            this.authSectionModal= 'UPDATEPUBLICITETHREE'

            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationUpdatePublicitesThreeCreate()

                    }else{

                        this.authModalClick('UPDATEPUBLICITETHREE')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('UPDATEPUBLICITETHREE')
                }

            }else{

                this.authModalClick('UPDATEPUBLICITETHREE')

            }

        },

        async publicationUpdatePublicitesThreeCreate(){

            this.loadingPublicationUpdatePublicitesThreeCreate = true

            this.authSectionModal= 'UPDATEPUBLICITETHREE'

            this.publicationUpdatePublicitesThreeCreateMessage =  null
            this.publicationUpdatePublicitesThreeCreateErrors = []

            if(this.status == 1){
                const date = new Date()

                this.date_publish = date.toISOString().slice(0, 16)
            }

            await this.actionsPublicationUpdatePublicitesThreeDataRequest({ slug : this.$route.params.slug, title : this.title, publication_slug :  this.publicationStorePublicitesFirstCreateData.publicationCreateData.slug,  link_publicites : this.link_publicites, status:  this.status, date_publish : this.date_publish, date_publish_end : this.date_publish_end, entete_site : this.entete_site, dans_les_contenus : this.dans_les_contenus, toutes_les_pages : this.toutes_les_pages, entre_publications : this.entre_publications  });

            if( this.getterInfosPublicationUpdatePublicitesThreeStatus ==="success"){

                this.publicationUpdatePublicitesFirstCreateData = this.getterInfosPublicationUpdatePublicitesThreeData

                this.publicationUpdatePublicitesThreeCreateMessage =  null
                this.publicationUpdatePublicitesThreeCreateErrors = []
                 

                const Toast = this.$swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: this.getterInfosPublicationUpdatePublicitesThreeMessage
                })

                this.loadingPublicationUpdatePublicitesThreeCreate = false

                this.publicationUpdatePublicitesThreeCreateMessage =  null
                this.publicationUpdatePublicitesThreeCreateErrors = []

                this.publicationStorePublicitesThreeCreateData = this.getterInfosPublicationUpdatePublicitesThreeData

                this.alreadyCreateThree = true;
 
            }else if( this.getterInfosPublicationUpdatePublicitesThreeStatus ==="empty"){

                this.publicationUpdatePublicitesThreeCreateMessage = this.getterInfosPublicationUpdatePublicitesThreeMessage

                this.publicationUpdatePublicitesThreeCreateErrors = this.getterInfosPublicationUpdatePublicitesThreeErrors

                this.loadingPublicationUpdatePublicitesThreeCreate = false


            }else if( this.getterInfosPublicationUpdatePublicitesThreeStatus ==="error"){

                this.publicationUpdatePublicitesThreeCreateMessage = this.getterInfosPublicationUpdatePublicitesThreeMessage

                this.publicationUpdatePublicitesThreeCreateErrors = []

                this.loadingPublicationUpdatePublicitesThreeCreate = false

            }
        },

        
 
    },
    mounted() {
    
        this.moment = moment 
    },
};
</script>
 
<style scoped >
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
