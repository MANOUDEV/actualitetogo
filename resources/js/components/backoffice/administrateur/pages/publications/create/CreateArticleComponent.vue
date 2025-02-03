<template>
    <div class="col-lg-12 col-xxl-8">
        <!-- Profile START -->
        <div class="card border mb-4">
            <div class="card-header border-bottom p-3">
                <h5 class="card-header-title mb-0">PUBLICATION {{publicationCreate.typePublication.name}}</h5>
            </div>
            <div class="card-body"  >

                <div class="d-sm-flex justify-content-sm-between align-items-center mb-3" v-if="stepStoreArticleFirst == true">
                    <div class="d-flex align-items-center">
                        <h5 class="card-header-title mb-0">Première étape</h5>
                    </div>
                    <div class="d-flex mt-2 mt-sm-0">
                        <div class="btn btn-primary btn-round mb-0 " @click="buttonStepStoreArticleFirstToTwo" style="font-size: 25px">
                            <i  class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                </div>

                <div  v-if="stepStoreArticleFirst == true">

                    <div v-if="publicationStoreArticleFirstCreateMessage">
                        <div class="alert alert-danger"  role="alert">
                            {{ publicationStoreArticleFirstCreateMessage }}
                        </div>
                    </div>

                    <form>
                        <div  v-if="alreadyCreateFirst == false">
                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3" v-if="publicationStoreArticleFirstCreateErrors.title">
                                            <label class="form-label" >Titre de la publication</label>
                                            <QuillEditor theme="snow" v-model:content="title" contentType="html" />
                                            <div v-for="errorname in publicationStoreArticleFirstCreateErrors.title" :key="errorname" class="invalid-feedback">
                                                {{ errorname }}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3" v-else>
                                            <label class="form-label" >Titre de la publication</label>
                                            <QuillEditor theme="snow" v-model:content="title" contentType="html" />
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 mt-3" v-if="publicationStoreArticleFirstCreateErrors.author">
                                    <label class="form-label" >Ajouter un auteur</label>
                                    <VueMultiselect
                                        v-model="author "
                                        :options="publicationCreate.authors"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir un auteur"
                                        label="authorName"
                                        track-by="authorName"
                                    />
                                    <div v-for="errorauthor in publicationStoreArticleFirstCreateErrors.author" :key="errorauthor" class="invalid-feedback">
                                        {{ errorauthor }}
                                    </div>
                                </div>
    
                                <div class="col-lg-6 mt-3" v-else>
                                    <label class="form-label" >Ajouter un auteur</label>
                                    <VueMultiselect
                                        v-model="author "
                                        :options="publicationCreate.authors"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir un auteur"
                                        label="authorName"
                                        track-by="authorName"
                                    />
                                </div>
    
                                <div class="col-lg-6 mt-3" v-if="publicationStoreArticleFirstCreateErrors.category">
                                    <label class="form-label" >Ajouter des catégories</label>
                                    <VueMultiselect
                                        v-model="category"
                                        :options="publicationCreate.categories"
                                        :multiple="true"
                                        :taggable="true"
                                        @tag="addCategory"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir des catégories"
                                        label="name"
                                        track-by="name"
                                    />
                                    <div v-for="errorcategory in publicationStoreArticleFirstCreateErrors.category" :key="errorcategory" class="invalid-feedback">
                                        {{ errorcategory }}
                                    </div>
                                </div>
    
                                <div class="col-lg-6 mt-3" v-else>
                                    <label class="form-label" >Ajouter des catégories</label>
                                    <VueMultiselect
                                        v-model="category"
                                        :options="publicationCreate.categories"
                                        :multiple="true"
                                        :taggable="true"
                                        @tag="addCategory"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir des catégories"
                                        label="name"
                                        track-by="name"
                                    />
                                </div>
    
                                <div class="col-lg-12 mt-3"  v-if="publicationStoreArticleFirstCreateErrors.source">
                                    <label class="form-label" >Ajouter le nom de la source</label>
                                    <input  name="source" v-model="source" type="text" class="form-control" placeholder="Veuillez entrer le nom de la source de cette publication">
                                </div>
    
                                <div class="col-lg-12 mt-3"  v-else>
                                    <label class="form-label" >Ajouter le nom de la source</label>
                                    <input  name="source" v-model="source" type="text" class="form-control" placeholder="Veuillez entrer le nom de la source de cette publication">
                                </div>
    
    
                            </div>
                        </div>
                        <div  v-else>
                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3" v-if="publicationStoreArticleFirstCreateErrors.title">
                                            <label class="form-label" >Titre de la publication</label>
                                            <QuillEditor theme="snow" v-model:content="title" contentType="html" />
                                            <div v-for="errorname in publicationStoreArticleFirstCreateErrors.title" :key="errorname" class="invalid-feedback">
                                                {{ errorname }}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3" v-else>
                                            <label class="form-label" >Titre de la publication</label>
                                            <QuillEditor theme="snow" v-model:content="title" contentType="html" />
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 mt-3" v-if="publicationStoreArticleFirstCreateErrors.author">
                                    <label class="form-label" >Ajouter un auteur</label>
                                    <VueMultiselect
                                        v-model="author "
                                        :options="publicationCreate.authors"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir un auteur"
                                        label="authorName"
                                        track-by="authorName"
                                    />
                                    <div v-for="errorauthor in publicationStoreArticleFirstCreateErrors.author" :key="errorauthor" class="invalid-feedback">
                                        {{ errorauthor }}
                                    </div>
                                </div>
    
                                <div class="col-lg-6 mt-3" v-else>
                                    <label class="form-label" >Ajouter un auteur</label>
                                    <VueMultiselect
                                        v-model="author "
                                        :options="publicationCreate.authors"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir un auteur"
                                        label="authorName"
                                        track-by="authorName"
                                    />
                                </div>
    
                                <div class="col-lg-6 mt-3" v-if="publicationStoreArticleFirstCreateErrors.category">
                                    <label class="form-label" >Ajouter des catégories</label>
                                    <VueMultiselect
                                        v-model="category"
                                        :options="publicationCreate.categories"
                                        :multiple="true"
                                        :taggable="true"
                                        @tag="addCategory"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir des catégories"
                                        label="name"
                                        track-by="name"
                                    />
                                    <div v-for="errorcategory in publicationStoreArticleFirstCreateErrors.category" :key="errorcategory" class="invalid-feedback">
                                        {{ errorcategory }}
                                    </div>
                                </div>
    
                                <div class="col-lg-6 mt-3" v-else>
                                    <label class="form-label" >Ajouter des catégories</label>
                                    <VueMultiselect
                                        v-model="category"
                                        :options="publicationCreate.categories"
                                        :multiple="true"
                                        :taggable="true"
                                        @tag="addCategory"
                                        :close-on-select="true"
                                        :clear-on-select="false"
                                        placeholder="Choisir des catégories"
                                        label="name"
                                        track-by="name"
                                    />
                                </div>
    
                                <div class="col-lg-12 mt-3"  v-if="publicationStoreArticleFirstCreateErrors.source">
                                    <label class="form-label" >Ajouter le nom de la source</label>
                                    <input  name="source" v-model="source" type="text" class="form-control" placeholder="Veuillez entrer le nom de la source de cette publication">
                                </div>
    
                                <div class="col-lg-12 mt-3"  v-else>
                                    <label class="form-label" >Ajouter le nom de la source</label>
                                    <input  name="source" v-model="source" type="text" class="form-control" placeholder="Veuillez entrer le nom de la source de cette publication">
                                </div>
    
    
                            </div>
                        </div>
                        <div v-if="alreadyCreateFirst === false">
                            <div class="d-flex justify-content-end mt-4" v-if="loadingPublicationStoreArticleFirstCreate == false">
                                <button type="button" @click="cancelArticleFirst" class="btn btn-danger border-0 me-2">Annuler</button>
                                <button type="submit"  @click="publicationStoreArticleFirst" class="btn btn-primary">Enregistrer</button>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-else>
                                <button type="button" disabled class="btn btn-success border-0 me-2">
                                    <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>En cours de sauvegarde...</button>
                            </div>
                        </div>
                        <div v-else>
                            <div class="d-flex justify-content-end mt-4" v-if="loadingPublicationUpdateArticleFirstCreate == false">
                                <button type="button" @click="cancelArticleFirst" class="btn btn-danger border-0 me-2">Annuler</button>
                                <button type="submit"  @click="publicationUpdateArticleFirst" class="btn btn-primary">Modifier</button>
                            </div>
                            <div class="d-flex justify-content-end mt-4" v-else>
                                <button type="button" disabled class="btn btn-success border-0 me-2">
                                    <i  style="color: #fff" class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>Modification...</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-sm-flex justify-content-sm-between align-items-center mb-3" v-if="stepStoreArticleTwo == true">
                    <div class="d-flex align-items-center">
                        <h5 class="card-header-title mb-0">Deuxième étape </h5>
                    </div>
                    <div class="d-flex mt-2 mt-sm-0">
                        <div class="btn btn-danger btn-round mb-0 " @click="buttonStepStoreArticleTwoToFirst" style="font-size: 25px">
                            <i  class="bi bi-arrow-left-short"></i>
                        </div> &nbsp;
                        <div class="btn btn-primary btn-round mb-0 " @click="buttonStepStoreArticleTwoToThree" style="font-size: 25px">
                            <i  class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                </div>
                <div  v-if="stepStoreArticleTwo == true">

                </div>

                <div class="d-sm-flex justify-content-sm-between align-items-center" v-if="stepStoreArticleThree == true">
                    <div class="d-flex align-items-center">
                        <h5 class="card-header-title mb-0">Troisième étape</h5>
                    </div>
                    <div class="d-flex mt-2 mt-sm-0">
                        <div class="btn btn-danger btn-round mb-0 " @click="buttonStepStoreArticleThreeToTwo" style="font-size: 25px">
                            <i  class="bi bi-arrow-left-short"></i>
                        </div> &nbsp;
                        <div class="btn btn-primary btn-round mb-0 " @click="buttonStepStoreArticleThreeToFour" style="font-size: 25px">
                            <i  class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                </div>

                <div v-if="stepStoreArticleThree == true">

                     

                </div>

                <div class="d-sm-flex justify-content-sm-between align-items-center" v-if="stepStoreArticleFour == true">
                    <div class="d-flex align-items-center">
                        <h5 class="card-header-title mb-0">Quatrième étape</h5>
                    </div>
                    <div class="d-flex mt-2 mt-sm-0">
                        <div class="btn btn-danger btn-round mb-0 " @click="buttonStepStoreArticleFourToThree" style="font-size: 25px">
                            <i  class="bi bi-arrow-left-short"></i>
                        </div> &nbsp;
                         
                    </div>
                </div>

                <div v-if="stepStoreArticleFour == true">

                    <div class="row" v-if="alreadyCreateFour == false">

                        <form style="margin-top: -15px">

                        </form>
                    </div>

                    <div class="row" v-else>

                        <form>


                        </form>
                    </div>

                </div>


            </div>


        </div>
    </div>
    <div class="modal fade" id="authFormModalpublicationStoreArticleCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">


            <!-- Login Form -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-if="authSectionStepModal == 1">Se connecter</h5>
                    <h5 class="modal-title" v-else-if="authSectionStepModal == 2">Modifier le mot de passe</h5>
                    <h5 class="modal-title" v-else-if="authSectionStepModal == 3">S'inscrire</h5>
                    <button type="button" class="btn-close" @click="authFormModalpublicationStoreArticleCreateClose" data-bs-dismiss="modal" aria-label="Close"></button>
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
import VueMultiselect from 'vue-multiselect';
export default {

    components: {
        QuillEditor, VueMultiselect,
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
            authSectionModal: 'CREATEARTICLEFIRST',
            publicationStoreArticleFirstCreateData: {
                publicationCreateData:{
                    slug: "null"
                }
            },
            publicationStoreArticleFirstCreateMessage: null,
            publicationStoreArticleFirstCreateErrors: { },
            publicationUpdateArticleFirstCreateData: {},
            publicationUpdateArticleFirstCreateMessage: null,
            publicationUpdateArticleFirstCreateErrors: { },
            publicationStoreArticleTwoCreateMessage: null,
            publicationStoreArticleTwoCreateErrors: { },
            publicationUpdateArticleTwoCreateData: {},
            publicationUpdateArticleTwoCreateMessage: null,
            publicationUpdateArticleTwoCreateErrors: { },
            publicationStoreArticleFourCreateMessage: null,
            publicationStoreArticleFourCreateErrors: { },
            publicationUpdateArticleFourCreateData: {},
            publicationUpdateArticleFourCreateMessage: null,
            publicationUpdateArticleFourCreateErrors: { },
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
            author: null,
            category: [ ],
            categories: null,
            tag: [ ],
            tags: null,
            source: null,
            date_publish: null,
            date_publish_end: null,
            show_date_publish: false,
            show_date_publish_end: true,
            showPsw: false,
            showPswC: false,
            loadingPublicationStoreArticleFirstCreate: false,
            loadingPublicationStoreArticleTwoCreate: false,
            loadingPublicationStoreArticleFourCreate: false,
            loadingPublicationUpdateArticleFirstCreate: false,
            loadingPublicationUpdateArticleTwoCreate: false,
            loadingPublicationUpdateArticleFourCreate: false,
            alreadyCreateFirst: false,
            alreadyCreateTwo: false,
            alreadyCreateFour: false,
            config: {
                events: {
                    initialized: function () {
                    console.log('initialized')
                    }
                }
            },
            stepStoreArticleFirst: true,
            stepStoreArticleTwo: false,
            stepStoreArticleThree: false,
            stepStoreArticleFour: false,

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

        ...mapGetters('storeArticleAdmin',{
            getterInfosPublicationStoreArticleFirstStatus:'getInfosPublicationStoreArticleFirstStatus',
            getterInfosPublicationStoreArticleFirstMessage:'getInfosPublicationStoreArticleFirstMessage',
            getterInfosPublicationStoreArticleFirstData:'getInfosPublicationStoreArticleFirstData',
            getterInfosPublicationStoreArticleFirstErrors:'getInfosPublicationStoreArticleFirstErrors',
            getterInfosPublicationUpdateArticleFirstStatus:'getInfosPublicationUpdateArticleFirstStatus',
            getterInfosPublicationUpdateArticleFirstMessage:'getInfosPublicationUpdateArticleFirstMessage',
            getterInfosPublicationUpdateArticleFirstData:'getInfosPublicationUpdateArticleFirstData',
            getterInfosPublicationUpdateArticleFirstErrors:'getInfosPublicationUpdateArticleFirstErrors',
            getterInfosPublicationStoreArticleThreeStatus:'getInfosPublicationStoreArticleThreeStatus',
            getterInfosPublicationStoreArticleThreeMessage:'getInfosPublicationStoreArticleThreeMessage',
            getterInfosPublicationStoreArticleThreeData:'getInfosPublicationStoreArticleThreeData',
            getterInfosPublicationStoreArticleThreeErrors:'getInfosPublicationStoreArticleThreeErrors',
            getterInfosPublicationUpdateArticleThreeStatus:'getInfosPublicationUpdateArticleThreeStatus',
            getterInfosPublicationUpdateArticleThreeMessage:'getInfosPublicationUpdateArticleThreeMessage',
            getterInfosPublicationUpdateArticleThreeData:'getInfosPublicationUpdateArticleThreeData',
            getterInfosPublicationUpdateArticleThreeErrors:'getInfosPublicationUpdateArticleThreeErrors',
            getterInfosPublicationStoreArticleFourStatus:'getInfosPublicationStoreArticleFourStatus',
            getterInfosPublicationStoreArticleFourMessage:'getInfosPublicationStoreArticleFourMessage',
            getterInfosPublicationStoreArticleFourData:'getInfosPublicationStoreArticleFourData',
            getterInfosPublicationStoreArticleFourErrors:'getInfosPublicationStoreArticleFourErrors',
            getterInfosPublicationUpdateArticleFourStatus:'getInfosPublicationUpdateArticleFourStatus',
            getterInfosPublicationUpdateArticleFourMessage:'getInfosPublicationUpdateArticleFourMessage',
            getterInfosPublicationUpdateArticleFourData:'getInfosPublicationUpdateArticleFourData',
            getterInfosPublicationUpdateArticleFourErrors:'getInfosPublicationUpdateArticleFourErrors',

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

        ...mapGetters('categoryAdmin',{
            getterInfosCategoryListStatus:'getInfosCategoryListStatus',
            getterInfosCategoryListMessage:'getInfosCategoryListMessage',
            getterInfosCategoryListData:'getInfosCategoryListData',
            getterInfosCategoryStoreStatus:'getInfosCategoryStoreStatus',
            getterInfosCategoryStoreMessage:'getInfosCategoryStoreMessage',
            getterInfosCategoryStoreErrors:'getInfosCategoryStoreErrors',
            getterInfosCategoryStoreData:'getInfosCategoryStoreData',

        }),

        ...mapGetters('tagsAdmin',{
            getterInfosTagsListStatus:'getInfosTagsListStatus',
            getterInfosTagsListMessage:'getInfosTagsListMessage',
            getterInfosTagsListData:'getInfosTagsListData',
            getterInfosTagsStoreStatus:'getInfosTagsStoreStatus',
            getterInfosTagsStoreMessage:'getInfosTagsStoreMessage',
            getterInfosTagsStoreErrors:'getInfosTagsStoreErrors',
            getterInfosTagsStoreData:'getInfosTagsStoreData',

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

        ...mapActions("storeArticleAdmin",{
          actionsPublicationStoreArticleFirstDataRequest:'publicationStoreArticleFirstDataRequest',
          actionsPublicationUpdateArticleFirstDataRequest:'publicationUpdateArticleFirstDataRequest',
          actionsPublicationStoreArticleThreeDataRequest:'publicationStoreArticleThreeDataRequest',
          actionsPublicationUpdateArticleThreeDataRequest:'publicationUpdateArticleThreeDataRequest',
          actionsPublicationStoreArticleFourDataRequest:'publicationStoreArticleFourDataRequest',
          actionsPublicationUpdateArticleFourDataRequest:'publicationUpdateArticleFourDataRequest',
        }),

        ...mapActions("categoryAdmin",{
          actionsCategoryListDataRequest:'categoryListDataRequest',
          actionsCategoryStoreDataRequest:'categoryStoreDataRequest',

        }),

        ...mapActions("tagsAdmin",{
          actionsTagsListDataRequest:'tagsListDataRequest',
          actionsTagsStoreDataRequest:'tagsStoreDataRequest',

        }),

        buttonStepStoreArticleFirstToTwo ( ){

            this.stepStoreArticleFirst = false

            this.stepStoreArticleTwo = true

            this.stepStoreArticleThree = false

        },

        buttonStepStoreArticleTwoToThree ( ){

            this.stepStoreArticleFirst = false

            this.stepStoreArticleTwo = false

            this.stepStoreArticleThree = true

        },

        buttonStepStoreArticleThreeToFour ( ){

            this.stepStoreArticleFirst = false

            this.stepStoreArticleTwo = false

            this.stepStoreArticleThree = false

            this.stepStoreArticleFour = true

        },

        buttonStepStoreArticleFourToThree ( ){

            this.stepStoreArticleFirst = false

            this.stepStoreArticleTwo = false

            this.stepStoreArticleThree = true

            this.stepStoreArticleFour = false

        },


        buttonStepStoreArticleThreeToTwo ( ){

            this.stepStoreArticleFirst = false

            this.stepStoreArticleTwo = true

            this.stepStoreArticleThree = false

        },

        buttonStepStoreArticleTwoToFirst ( ){

            this.stepStoreArticleFirst = true

            this.stepStoreArticleTwo = false

            this.stepStoreArticleThree = false

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

        authFormModalpublicationStoreArticleCreateClose(){
            this.errorForgotPasswordFirst = null
            this.errorsForgotPasswordFirst = []
            this.errorForgotPasswordTwo = null
            this.errorsForgotPasswordTwo = []
            this.errorForgotPasswordThree = null
            this.errorsForgotPasswordThree = []
            this.errorLogin = false
            this.errorsLogin = []
            $('#authFormModalpublicationStoreArticleCreate').modal('hide');
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

            if(this.authSectionModal == "CREATEARTICLEFIRST"){

                this.loadingPublicationStoreArticleFirstCreate = false

            }else if(this.authSectionModal == "UPDATEARTICLEFIRST"){

                this.loadingPublicationUpdateArticleFirstCreate = false

            }else if(this.authSectionModal == "CREATEARTICLETWO"){

                this.loadingPublicationStoreArticleTwoCreate = false

            }else if(this.authSectionModal == "UPDATEARTICLETWO"){

                this.loadingPublicationUpdateArticleTwoCreate = false

            } else if(this.authSectionModal == "CREATEARTICLEFOUR"){

                this.loadingPublicationStoreArticleFourCreate = false

            }else if(this.authSectionModal == "UPDATEARTICLEFOUR"){

                this.loadingPublicationUpdateArticleFourCreate = false

            }


            $('#authFormModalpublicationStoreArticleCreate').modal('show');


        },

        uploadPhotosVideosModalOpen(){

            $('#uploadPhotosVideosModalpublicationStoreArticleCreate').modal('show');

        },

        uploadPhotosVideosModalClose(){

            $('#uploadPhotosVideosModalpublicationStoreArticleCreate').modal('hidden');

        },

        uploadPhotosCoverModalOpen(){

            $('#uploadPhotosCoverModalpublicationStoreArticleCreate').modal('show');

        },

        uploadPhotosCoverModalClose(){

            $('#uploadPhotosCoverModalpublicationStoreArticleCreate').modal('hidden');

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



                    if(this.authSectionModal== 'CREATEARTICLEFIRST'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationStoreArticleFirstCreate = true

                        this.publicationStoreArticleFirstCreate()

                    }else if(this.authSectionModal== 'UPDATEARTICLEFIRST'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationUpdateArticleFirstCreate = true

                        this.publicationUpdateArticleFirstCreate()

                    }else if(this.authSectionModal== 'CREATEARTICLETWO'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationStoreArticleTwoCreate = true

                        this.publicationStoreArticleTwoCreate()

                    }else if(this.authSectionModal== 'UPDATEARTICLETWO'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationUpdateArticleTwoCreate = true

                        this.publicationUpdateArticleTwoCreate()

                    } else  if(this.authSectionModal== 'CREATEARTICLEFOUR'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationStoreArticleFourCreate = true

                        this.publicationStoreArticleFourCreate()

                    }else if(this.authSectionModal== 'UPDATEARTICLEFOUR'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationUpdateArticleFourCreate = true

                        this.publicationUpdateArticleFourCreate()
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

                    if(this.authSectionModal== 'CREATEARTICLEFIRST'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationStoreArticleFirstCreate = true

                        this.publicationStoreArticleFirstCreate()

                    }else if(this.authSectionModal== 'UPDATEARTICLEFIRST'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationUpdateArticleFirstCreate = true

                        this.publicationUpdateArticleFirstCreate()

                    }else if(this.authSectionModal== 'CREATEARTICLETWO'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationStoreArticleTwoCreate = true

                        this.publicationStoreArticleTwoCreate()

                    }else if(this.authSectionModal== 'UPDATEARTICLETWO'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationUpdateArticleTwoCreate = true

                        this.publicationUpdateArticleTwoCreate()

                    } else  if(this.authSectionModal== 'CREATEARTICLEFOUR'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationStoreArticleFourCreate = true

                        this.publicationStoreArticleFourCreate()

                    }else if(this.authSectionModal== 'UPDATEARTICLEFOUR'){

                        this.authFormModalpublicationStoreArticleCreateClose()

                        this.loadingPublicationUpdateArticleFourCreate = true

                        this.publicationUpdateArticleFourCreate()
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



        cancelArticleFirst(){

            this.author = null
            this.category = [ ]
            this.source = null
            this.title  = null
            this.alreadyCreateFirst = false
        },

        cancelArticleTwo(){

            this.content = null
            this.tag = [ ]
        },

        cancelArticleThree(){

        },

        cancelArticleFour(){

            this.status = 1,
            this.date_publish = null
            this.show_date_publish = false
            this.show_date_publish_end = true

        },


        async addCategory (newCategory) {
            const category = {
                name: newCategory,
            }
            await this.actionsCategoryStoreDataRequest({ name : newCategory});

            if( this.getterInfosCategoryStoreStatus ==="success"){

                this.categories.push(this.getterInfosCategoryStoreData.categoryCreateData)

                this.category.push(this.getterInfosCategoryStoreData.categoryCreateData)

            }

        },

        async addTag (newTag) {
            const tag = {
                name: newTag,
            }
            await this.actionsTagsStoreDataRequest({ name : newTag});

            if( this.getterInfosTagsStoreStatus ==="success"){


                this.tags.push(this.getterInfosTagsStoreData.tagCreateData)

                this.tag.push(this.getterInfosTagsStoreData.tagCreateData)

            }

        },

        async publicationStoreArticleFirst(){

            this.loadingPublicationStoreArticleFirstCreate = true

            this.authSectionModal= 'CREATEARTICLEFIRST'

            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationStoreArticleFirstCreate()

                    }else{

                        this.authModalClick('CREATEARTICLEFIRST')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('CREATEARTICLEFIRST')
                }

            }else{

                this.authModalClick('CREATEARTICLEFIRST')

            }

        },

        async publicationStoreArticleFirstCreate(){

            this.loadingPublicationStoreArticleFirstCreate = true

            this.authSectionModal= 'CREATEARTICLEFIRST'

            this.publicationStoreArticleFirstCreateMessage =  null
            this.publicationStoreArticleFirstCreateErrors = []

            if(this.status == 1){
                const date = new Date()

                this.date_publish = date.toISOString().slice(0, 16)
            }

            await this.actionsPublicationStoreArticleFirstDataRequest({ slug : this.$route.params.slug, title : this.title, source : this.source, author : this.author,  category : this.category ,  tag : this.tag   });

            if( this.getterInfosPublicationStoreArticleFirstStatus ==="success"){

                this.publicationStoreArticleFirstCreateData = this.getterInfosPublicationStoreArticleFirstData

                this.publicationStoreArticleFirstCreateMessage =  null
                this.publicationStoreArticleFirstCreateErrors = []


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
                    title: this.getterInfosPublicationStoreArticleFirstMessage
                })

                this.loadingPublicationStoreArticleFirstCreate = false

                this.publicationStoreArticleFirstCreateMessage =  null
                this.publicationStoreArticleFirstCreateErrors = []

                this.publicationStoreArticleFirstCreateData = this.getterInfosPublicationStoreArticleFirstData

                this.alreadyCreateFirst = true;

            }else if( this.getterInfosPublicationStoreArticleFirstStatus ==="empty"){

                this.publicationStoreArticleFirstCreateMessage = this.getterInfosPublicationStoreArticleFirstMessage

                this.publicationStoreArticleFirstCreateErrors = this.getterInfosPublicationStoreArticleFirstErrors

                this.loadingPublicationStoreArticleFirstCreate = false


            }else if( this.getterInfosPublicationStoreArticleFirstStatus ==="error"){

                this.publicationStoreArticleFirstCreateMessage = this.getterInfosPublicationStoreArticleFirstMessage

                this.publicationStoreArticleFirstCreateErrors = []

                this.loadingPublicationStoreArticleFirstCreate = false

            }
        },

         async publicationUpdateArticleFirst(){

            this.loadingPublicationUpdateArticleFirstCreate = true

            this.authSectionModal= 'UPDATEARTICLEFIRST'

            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationUpdateArticleFirstCreate()

                    }else{

                        this.authModalClick('UPDATEARTICLEFIRST')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('UPDATEARTICLEFIRST')
                }

            }else{

                this.authModalClick('UPDATEARTICLEFIRST')

            }

        },

        async publicationUpdateArticleFirstCreate(){

            this.loadingPublicationUpdateArticleFirstCreate = true

            this.authSectionModal= 'UPDATEARTICLEFIRST'

            this.publicationStoreArticleFirstCreateMessage =  null
            this.publicationStoreArticleFirstCreateErrors = []

            if(this.status == 1){
                const date = new Date()

                this.date_publish = date.toISOString().slice(0, 16)
            }

            await this.actionsPublicationUpdateArticleFirstDataRequest({ slug : this.$route.params.slug, title : this.title, source : this.source, author : this.author,  category : this.category ,  tag : this.tag, publication_slug :  this.publicationStoreArticleFirstCreateData.publicationCreateData.slug  });

            if( this.getterInfosPublicationUpdateArticleFirstStatus ==="success"){

                this.publicationStoreArticleFirstCreateData = this.getterInfosPublicationUpdateArticleFirstData

                this.publicationStoreArticleFirstCreateMessage =  null
                this.publicationStoreArticleFirstCreateErrors = []


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
                    title: this.getterInfosPublicationUpdateArticleFirstMessage
                })

                this.loadingPublicationUpdateArticleFirstCreate = false

                this.publicationStoreArticleFirstCreateMessage =  null
                this.publicationStoreArticleFirstCreateErrors = []

                this.publicationStoreArticleFirstCreateData = this.getterInfosPublicationUpdateArticleFirstData

                this.alreadyCreateFirst = true;

            }else if( this.getterInfosPublicationUpdateArticleFirstStatus ==="empty"){

                this.publicationStoreArticleFirstCreateMessage = this.getterInfosPublicationUpdateArticleFirstMessage

                this.publicationStoreArticleFirstCreateErrors = this.getterInfosPublicationUpdateArticleFirstErrors

                this.loadingPublicationUpdateArticleFirstCreate = false


            }else if( this.getterInfosPublicationUpdateArticleFirstStatus ==="error"){

                this.publicationStoreArticleFirstCreateMessage = this.getterInfosPublicationUpdateArticleFirstMessage

                this.publicationStoreArticleFirstCreateErrors = []

                this.loadingPublicationUpdateArticleFirstCreate = false

            }
        },

        async publicationStoreArticleTwo(){

            this.loadingPublicationStoreArticleThreeCreate = true

            this.authSectionModal= 'CREATEARTICLETWO'


            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationStoreArticleTwoCreate()

                    }else{

                        this.authModalClick('CREATEARTICLETWO')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('CREATEARTICLETWO')
                }

            }else{

                this.authModalClick('CREATEARTICLETWO')

            }

        },

        async publicationStoreArticleTwoCreate(){


        },

        async publicationUpdateArticleTwo(){

            this.loadingPublicationUpdateArticleTwoCreate = true

            this.authSectionModal= 'UPDATEARTICLETWO'

            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationUpdateArticleTwoCreate()

                    }else{

                        this.authModalClick('UPDATEARTICLETWO')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('UPDATEARTICLETWO')
                }

            }else{

                this.authModalClick('UPDATEARTICLETWO')

            }

        },

        async publicationUpdateArticleTwoCreate(){


        },

        async publicationStoreArticleFour(){

            this.loadingPublicationStoreArticleFourCreate = true

            this.authSectionModal= 'CREATEARTICLEFOUR'


            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationStoreArticleFourCreate()

                    }else{

                        this.authModalClick('CREATEARTICLEFOUR')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('CREATEARTICLEFOUR')
                }

            }else{

                this.authModalClick('CREATEARTICLEFOUR')

            }

        },

        async publicationStoreArticleFourCreate(){


        },

        async publicationUpdateArticleFour(){

            this.loadingPublicationUpdateArticleFourCreate = true

            this.authSectionModal= 'UPDATEARTICLEFOUR'

            if(localStorage.getItem('access_token') && localStorage.getItem('nbRsp')){

                await this.actionsGetMeRole();

                if(this.gettersRoleStatus === 'success'){

                    this.meRoleName = this.gettersMeRoleName

                    if((this.meRoleName == localStorage.getItem('nbRsp')) && (localStorage.getItem('nbRsp') === '&nbtsd!?')){

                        this.publicationUpdateArticleFourCreate()

                    }else{

                        this.authModalClick('UPDATEARTICLEFOUR')

                    }

                }else if(this.gettersRoleStatus === 'failed'){

                    this.authModalClick('UPDATEARTICLEFOUR')
                }

            }else{

                this.authModalClick('UPDATEARTICLEFOUR')

            }

        },

        async publicationUpdateArticleFourCreate(){


        },
    },
    mounted() {

        this.moment = moment
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

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
