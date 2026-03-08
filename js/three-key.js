// On commence par l'import qui est nécessaire au fonctionnement de notre modèle 3D
import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const container = document.getElementById("three-container");
if (!container) throw new Error("three-container introuvable");

// Ajout de la scène, du moteur de rendu puis de la caméra
const scene = new THREE.Scene();
const renderer = new THREE.WebGLRenderer({ alpha: true, powerPreference: 'high-performance' });
const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);

const clock = new THREE.Clock();
let animationId = null;
let isVisible = true;


// Ajout de la lumière sinon la texture n'apparaît pas
const light = new THREE.DirectionalLight(0xffffff, 2);
light.position.set(10, 10, 10);
scene.add(light);

// Lumière principale -> un peu moins intense
const dirLight = new THREE.DirectionalLight(0xffffff, 1.2);
dirLight.position.set(5, 10, 7);
dirLight.castShadow = false;
scene.add(dirLight);

// Lumière secondaire pour éviter trop d'ombres
const fillLight = new THREE.DirectionalLight(0xfff2d8, 0.8);
fillLight.position.set(-5, -3, 5);
scene.add(fillLight);

// Lumière ambiante pour illuminer globalement
const ambient = new THREE.AmbientLight(0xffffff, 0.6);
scene.add(ambient);


// Charger le modèle GLB
const loader = new GLTFLoader();

loader.load(
    '3D/source/model.glb',
    (gltf) => {
        // On récupère la clé 3d et on 'ajoute dans notre scène three js 
        const clé = gltf.scene;
        scene.add(clé);

        // Ici on adapte la taille, grâce à une boite dans laquelle la clé est placée au centre pour que
        // quand elle tourne sur elle-même elle tourne au centre et pas autour d"un coin
        const box = new THREE.Box3().setFromObject(clé);
        const center = box.getCenter(new THREE.Vector3());
        const size = box.getSize(new THREE.Vector3());

        clé.position.sub(center);
        const maxDim = Math.max(size.x, size.y, size.z);

        // calcul distance idéale caméra
        const fov = camera.fov * (Math.PI / 180);
        let cameraZ = Math.abs(maxDim / 2 / Math.tan(fov / 2));

        cameraZ *= 1.3; // marge pour que la clé ne dépasse pas de la boîte

        // La caméra regarde au centre donc de la clé
        camera.position.set(0, 0, cameraZ);
        camera.lookAt(0, 0, 0);

        // On stocke la clé dans une variablke pour pouvoir l'utiliser ensuite dans un notre fonction animate
        window.cleAnimation = clé;
    },
    (progress) => console.log('Chargement', progress), // messages dans la console pour vérifier le bon chargement
    (err) => console.error('Erreur chargement GLB', err) // test pour savoir si le modèle a bien chargé ou pas

);

renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

function resizeRendererToDisplaySize() {
    const width = container.clientWidth;
    const height = container.clientHeight;
    if (width === 0 || height === 0) return false;
    if (renderer.domElement.width !== width || renderer.domElement.height !== height) {
        renderer.setSize(width, height);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        return true;
    }
    return false;
}

// Ici on configure la caméra en rapport avec le parent pour qu'elle ne soit pas déformée 
camera.aspect = container.clientWidth / container.clientHeight;
camera.updateProjectionMatrix();

// On mets le rendu du moteur de rendu en plein écran et l’ajouter dans la page HTML
renderer.setSize(container.clientWidth, container.clientHeight);
container.appendChild(renderer.domElement);

function animate() {
    if (!isVisible) return;
    animationId = requestAnimationFrame(animate);
    const delta = clock.getDelta();
    if (window.cleAnimation) {
        const speed = 0.5;
        window.cleAnimation.rotation.y += speed * delta;
        window.cleAnimation.rotation.z = -Math.PI / 2.5;
        resizeRendererToDisplaySize();
        renderer.render(scene, camera);
    }
}

const heroSection = container.closest('.hero-accueil');
if (heroSection) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const nowVisible = entry.isIntersecting;
            if (nowVisible && !isVisible) {
                isVisible = true;
                animate();
            } else {
                isVisible = nowVisible;
                if (!isVisible && animationId) {
                    cancelAnimationFrame(animationId);
                    animationId = null;
                }
            }
        });
    }, { threshold: 0.1 });
    observer.observe(heroSection);
}
window.addEventListener('resize', resizeRendererToDisplaySize);
animate();