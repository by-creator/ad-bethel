<script>
    document.addEventListener('DOMContentLoaded', () => {

        const steps = document.querySelectorAll('.step');
        const progressBar = document.getElementById('progressBar');
        const stepNumber = document.getElementById('stepNumber');

        let current = 0;
        const total = steps.length - 1;

        function isValidEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        function validateCurrentStep() {
    const currentStep = document.querySelector('.step.active');
    const fields = currentStep.querySelectorAll('input, select, textarea');

    let valid = true;
    let emailError = false;

    fields.forEach(field => {

        if (!field.value || field.value.trim() === '') {
            valid = false;
            field.classList.add('is-invalid');
            return;
        }

        // 🔥 VALIDATION EMAIL
        if (field.name === 'email' && !isValidEmail(field.value)) {
            valid = false;
            emailError = true;
            field.classList.add('is-invalid');
            return;
        }

        field.classList.remove('is-invalid');
    });

    if (!valid) {
        Swal.fire({
            icon: 'warning',
            title: 'Erreur de saisie',
            text: emailError
                ? 'Veuillez saisir une adresse email valide.'
                : 'Veuillez remplir tous les champs requis.',
            confirmButtonColor: '#b91c1c'
        });
    }

    return valid;
}

        function showStep(index) {
            steps.forEach((step, i) => {
                step.classList.toggle('active', i === index);
            });

            const percent = Math.round((index / total) * 100);
            progressBar.style.width = percent + '%';

            stepNumber.textContent = index + 1;
        }

        document.querySelectorAll('.next').forEach(btn => {
            btn.addEventListener('click', () => {

                // 🔒 Validation étape courante
                if (!validateCurrentStep()) return;

                if (current < steps.length - 1) {
                    current++;
                    showStep(current);
                }
            });
        });

        document.querySelectorAll('.prev').forEach(btn => {
            btn.addEventListener('click', () => {
                if (current > 0) {
                    current--;
                    showStep(current);
                }
            });
        });

        showStep(0);
    });
</script>
