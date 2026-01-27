

<div class="auth-card">

    <div style="text-align:center; margin-bottom:20px">
    <a href="{{ route('login') }}"
       style="
           font-size:13px;
           color:#b91c1c;
           text-decoration:none;
           font-weight:500;
       ">
        CONNEXION
    </a>
</div>

    <!-- IMAGE -->
    <img src="{{ asset('apex/assets/images/inste.jpeg') }}">

    <div class="auth-title">Veuillez remplir le formulaire</div>
    <div class="auth-subtitle">
        Étape <span id="stepNumber"></span> sur 6
    </div>

    <div class="progress">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <form method="POST" action="{{ route('inscription.store') }}" id="wizardForm">
        @csrf

        <!-- STEP 1 -->
        <div class="step active">
            <div class="form-group">
                <label>Nom & Prénom</label>
                <input class="form-control" name="nom_prenom">
            </div>

            <div class="form-group">
                <label>Téléphone</label>
                <input class="form-control" name="telephone">
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 2 -->
        <div class="step">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email">
            </div>

            <div class="form-group">
                <label>Nationalité</label>
                <input class="form-control" name="nationalite">
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 3 -->
        <div class="step">
            <div class="form-group">
                <label>État civil</label>
                <select class="form-control" name="etat_civil">
                    <option value="">Sélectionner</option>
                    <option value="celibataire">Célibataire</option>
                    <option value="marie_sans_enfant">Marié sans enfant</option>
                    <option value="marie_avec_enfant">Marié avec enfant</option>
                    <option value="divorce">Divorcé</option>
                </select>
            </div>

            <div class="form-group">
                <label>Église</label>
                <input class="form-control" name="eglise">
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 4 -->
        <div class="step">
            <div class="form-group">
                <label>Date de conversion</label>
                <input type="date" class="form-control" name="date_conversion">
            </div>

            <div class="form-group">
                <label>Motivation</label>
                <textarea class="form-control" name="motivation"></textarea>
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 5 -->
        <div class="step">
            <div class="form-group">
                <label>Engagement</label>
                <select class="form-control" name="engagement">
                    <option value="">Choisir</option>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>

            <div class="form-group">
                <label>Engagement paiement</label>
                <select class="form-control" name="engagement_paiement">
                    <option value="">Choisir</option>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 6 -->
        <div class="step">
            <div style="text-align:center; padding:20px 10px">
                <div style="
                    width:70px;height:70px;margin:0 auto 20px;
                    border-radius:50%;background:#fee2e2;
                    display:flex;align-items:center;justify-content:center;
                    font-size:32px;color:#b91c1c;">✓</div>

                <h4>Merci d’avoir rempli le formulaire</h4>
                <p style="color:#6b7280;font-size:14px">
                    Vous pouvez revenir vérifier vos réponses<br>
                    ou finaliser votre inscription.
                </p>

                <div class="wizard-actions">
                    <button type="button" class="btn-prev prev">Précédent</button>
                    <button type="submit" class="btn-next">Finaliser</button>
                </div>
            </div>
        </div>

    </form>
</div>
