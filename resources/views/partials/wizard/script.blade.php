<script>
const steps = document.querySelectorAll('.step');
const progressBar = document.getElementById('progressBar');
const stepNumber = document.getElementById('stepNumber');

let current = 0;

function showStep(index) {
    steps.forEach((step, i) => {
        step.classList.toggle('active', i === index);
    });

    progressBar.style.width = ((index + 1) / steps.length) * 100 + '%';
    stepNumber.textContent = index + 1;
}

document.querySelectorAll('.next').forEach(btn => {
    btn.onclick = () => {
        if (current < steps.length - 1) {
            current++;
            showStep(current);
        }
    };
});

document.querySelectorAll('.prev').forEach(btn => {
    btn.onclick = () => {
        if (current > 0) {
            current--;
            showStep(current);
        }
    };
});

showStep(current);
</script>
