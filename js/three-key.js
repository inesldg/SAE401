// import * as THREE from 'https://unpkg.com/three@0.160.0/build/three.module.js';
// import { GLTFLoader } from 'https://unpkg.com/three@0.160.0/examples/jsm/loaders/GLTFLoader.js';

import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const container = document.getElementById("three-container");

// Ajout de la scène, du moteur de rendun puis de la caméra
const scene = new THREE.Scene();
const renderer = new THREE.WebGLRenderer({ alpha: true }); // ici j'ai ajouté l'alpha car le fond est transparent
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

// Ajout de la lumière sinon la texture n'apparaît pas
const light = new THREE.DirectionalLight(0xffffff, 2);
light.position.set(10, 10, 10);
scene.add(light);



// Lumière principale (Directional) - un peu moins intense et position décalée
const dirLight = new THREE.DirectionalLight(0xffffff, 1.2);
dirLight.position.set(5, 10, 7);
dirLight.castShadow = true;
scene.add(dirLight);

// Lumière secondaire pour “remplir” les ombres
const fillLight = new THREE.DirectionalLight(0xfff2d8, 0.8); // ton doré doux
fillLight.position.set(-5, -3, 5);
scene.add(fillLight);

// Lumière ambiante pour illuminer globalement
const ambient = new THREE.AmbientLight(0xffffff, 0.6);
scene.add(ambient);

// Optionnel : hémisphère pour un rendu un peu plus réaliste du ciel/sol
const hemi = new THREE.HemisphereLight(0xffffff, 0x444444, 0.5);
scene.add(hemi);


// Charger le modèle GLB
const loader = new GLTFLoader();

loader.load(
    '3D/source/model.glb',
    (gltf) => {
        const key = gltf.scene;
        scene.add(key);

        // Optionnel : centrer et adapter la taille (à ajuster selon ta clé)
        const box = new THREE.Box3().setFromObject(key);
        const center = box.getCenter(new THREE.Vector3());
        const size = box.getSize(new THREE.Vector3());

        key.position.sub(center);
        const maxDim = Math.max(size.x, size.y, size.z);

        // calcul distance idéale caméra
        const fov = camera.fov * (Math.PI / 180);
        let cameraZ = Math.abs(maxDim / 2 / Math.tan(fov / 2));

        cameraZ *= 1.3; // marge

        camera.position.set(0, 0, cameraZ);
        camera.lookAt(0, 0, 0);

        // const scale = 15 / maxDim;
        // key.scale.setScalar(scale);

        // // Garder une ref pour faire tourner la clé dans animate()
        window.keyModel = key;
    },
    (progress) => console.log('Chargement', progress),
    (err) => console.error('Erreur chargement GLB', err)
);

function resizeRendererToDisplaySize() {

    const width = container.clientWidth;
    const height = container.clientHeight;

    const needResize = renderer.domElement.width !== width ||
        renderer.domElement.height !== height;

    if (needResize) {
        renderer.setSize(width, height, false);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
    }
}

camera.aspect = container.clientWidth / container.clientHeight;
camera.updateProjectionMatrix();

// Mettre le rendu du moteur de rendu en plein écran et l’ajouter dans la page HTML
renderer.setSize(container.clientWidth, container.clientHeight);
container.appendChild(renderer.domElement);

// Définir la fonction finale
function animate() {

    if (window.keyModel) {

        // rotation propre sur elle-même (axe vertical Y)
        window.keyModel.rotation.y += 0.01;
        window.keyModel.rotation.z = -Math.PI / 2.5;
    }

    resizeRendererToDisplaySize();
    renderer.render(scene, camera);
    requestAnimationFrame(animate);
}
animate();