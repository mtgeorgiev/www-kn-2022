
const displayOwners = owners => {
    console.log(owners);
}

const loadOwners = () => {
    fetch('./owner.php')
        .then(response => response.json())
        .then(displayOwners);
}

document.getElementById('see-owners').addEventListener('click', loadOwners);