import "../scss/ancs.scss";
function createSineWave(
    container,
    numPoints,
    amplitude,
    frequency,
    phaseOffset,
    angleOffset
) {
    for (let i = 0; i < numPoints; i++) {
        const point = document.createElement("div");
        point.className = "point";
        container.appendChild(point);

        const x = (i / numPoints) * container.offsetWidth;
        const y =
            amplitude * Math.sin(frequency * x + phaseOffset) +
            container.offsetHeight / 2;

        point.style.left = x + "px";
        point.style.top = y + "px";
        point.style.transform = `rotate(${angleOffset}deg)`;
    }
}

function animate() {
    const containers = document.querySelectorAll(".sine-wave-container");

    containers.forEach((container, index) => {
        const config = waveConfigs[index];
        const points = container.querySelectorAll(".point");
        const time = performance.now();

        points.forEach((point, i) => {
            const x = (i / points.length) * container.offsetWidth;
            const y =
                config.amplitude *
                    Math.sin(
                        config.frequency * x + config.phaseOffset + time / 1000
                    ) +
                container.offsetHeight / 2;
            point.style.top = y + "px";
        });
    });

    requestAnimationFrame(animate);
}

const container = document.querySelector(".sine-wave-container");
const waveConfigs = [
    { amplitude: 30, frequency: 0.02, phaseOffset: 0.2, angleOffset: 0 },
    { amplitude: 40, frequency: 0.03, phaseOffset: 0.5, angleOffset: 30 },
    { amplitude: 20, frequency: 0.04, phaseOffset: 1.0, angleOffset: 60 },
];

waveConfigs.forEach((config) => {
    createSineWave(
        container,
        100,
        config.amplitude,
        config.frequency,
        config.phaseOffset,
        config.angleOffset
    );
});

animate();
