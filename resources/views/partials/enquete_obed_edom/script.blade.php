<script>
    document.addEventListener('DOMContentLoaded', () => {

        const steps = document.querySelectorAll('.step');
        const progressBar = document.getElementById('progressBar');
        const stepNumber = document.getElementById('stepNumber');
        const rubriqueNumber = document.getElementById('rubriqueNumber');
        const rubriqueTitle = document.getElementById('rubriqueTitle');

        let current = 0;
        const total = steps.length - 1;

        const rubriques = [
            { number: '',           title: 'Enquête Obed-Edom' },
            { number: 'Rubrique 1', title: 'Propositions & appréciations des membres' },
            { number: 'Rubrique 2', title: 'Première rencontre en présentiel' },
            { number: 'Rubrique 3', title: 'Sujets à aborder selon vos défis' },
            { number: 'Rubrique 4', title: 'Disponibilité pour le 3e culte' },
            { number: 'Rubrique 5', title: 'Êtes-vous entrepreneur ?' },
            { number: '',           title: 'Confirmation' },
        ];

        function validateCurrentStep() {
            const currentStep = document.querySelector('.step.active');
            const fields = currentStep.querySelectorAll('input, select');

            let valid = true;

            fields.forEach(field => {
                if (!field.value || field.value.trim() === '') {
                    valid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!valid) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Erreur de saisie',
                    text: 'Veuillez remplir tous les champs requis.',
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

            rubriqueNumber.textContent = rubriques[index].number;
            rubriqueTitle.textContent = rubriques[index].title;
        }

        document.querySelectorAll('.next').forEach(btn => {
            btn.addEventListener('click', () => {
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
