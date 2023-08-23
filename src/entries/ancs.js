import "../scss/ancs.scss";

const canvas = document.getElementById("sine-wave-canvas");
const ctx = canvas.getContext("2d");

const waveConfigs = [
    { amplitude: 30, frequency: 0.02, phaseOffset: 0.2, angleOffset: 0 },
    { amplitude: 40, frequency: 0.03, phaseOffset: 0.5, angleOffset: 30 },
    { amplitude: 20, frequency: 0.04, phaseOffset: 1.0, angleOffset: 60 },
];

let time = 0;

function animate() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    waveConfigs.forEach((config) => {
        const { amplitude, frequency, phaseOffset, angleOffset } = config;
        ctx.beginPath();
        ctx.moveTo(0, canvas.height / 2);

        for (let x = 0; x < canvas.width; x++) {
            const y =
                amplitude * Math.sin(frequency * x + phaseOffset + time) +
                canvas.height / 2;
            ctx.lineTo(x, y);
        }

        ctx.strokeStyle = "#3498db";
        ctx.lineWidth = 2;
        ctx.stroke();
        ctx.closePath();

        time += 0.005;
    });

    requestAnimationFrame(animate);
}

animate();
