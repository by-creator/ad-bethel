<style>
:root {
    --brand-red: #b91c1c;
    --brand-red-dark: #991b1b;
    --brand-red-light: #fee2e2;
}

body {
    background-color: #f1f5f9;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}

/* CARD */
.auth-card {
    max-width: 460px;
    margin: 80px auto;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.08);
    padding: 36px;
}

/* IMAGE */
.auth-card img {
    width: 100%;
    height: auto;
    border-radius: 12px;
    margin-bottom: 15px;
}

/* TITRES */
.auth-title {
    text-align: center;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 4px;
}

.auth-subtitle {
    text-align: center;
    font-size: 13px;
    color: #6b7280;
    margin-bottom: 25px;
}

/* PROGRESS */
.progress {
    height: 6px;
    border-radius: 10px;
    background-color: #e5e7eb;
    margin-bottom: 30px;
}

.progress-bar {
    width: 0% !important;
    flex: 0 0 auto !important; /* 🔥 clé Bootstrap */
}



/* FORM */
.form-group {
    margin-bottom: 18px;
}

 
.is-invalid {
    border-color: #b91c1c !important;
    box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.15);
}


label {
    font-size: 13px;
    font-weight: 500;
    color: #374151;
    margin-bottom: 6px;
    display: block;
}

.form-control {
    width: 100%;
    height: 48px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    font-size: 14px;
    padding: 0 14px;
}

.form-control:focus {
    border-color: var(--brand-red);
    box-shadow: 0 0 0 4px rgba(185, 28, 28, 0.15);
}

/* STEPS */
.step {
    display: none;
    animation: fade 0.35s ease-in-out;
}

.step.active {
    display: block;
}

@keyframes fade {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ACTIONS */
.wizard-actions {
    display: flex;
    gap: 12px;
    margin-top: 30px;
}

.wizard-actions button,
.wizard-actions a {
    flex: 1;
    text-align: center;
}

/* BUTTONS */
.btn-next {
    background-color: var(--brand-red);
    color: #fff;
    border: none;
    height: 50px;
    border-radius: 12px;
    font-weight: 500;
}

.btn-next:hover {
    background-color: var(--brand-red-dark);
}

.btn-prev {
    background-color: var(--brand-red-light);
    color: var(--brand-red);
    border: none;
    height: 50px;
    border-radius: 12px;
    font-weight: 500;
}

/* MOBILE FULLSCREEN */
@media (max-width: 576px) {
    body {
        background-color: #ffffff;
    }

    .auth-card {
        max-width: 100%;
        margin: 0;
        min-height: 100vh;
        border-radius: 0;
        padding: 22px 20px;
        box-shadow: none;
    }

    .auth-title {
        font-size: 20px;
    }

    .btn-next,
    .btn-prev {
        height: 52px;
        font-size: 16px;
    }
}
</style>
