
class Owner {

    constructor (dataObject) {
        this.id = dataObject.id;
        this.username = dataObject.username;
        this.password = dataObject.password;
        this.registeredOn = dataObject.registeredOn;
        this.lastLoginOn = dataObject.lastLoginOn;
        this.introText = dataObject.introText;
    }

    getHtmlElementForItemInList() {
        
        const usernameText = document.createTextNode(this.username);

        const usernameContainer = document.createElement('span');
        usernameContainer.setAttribute('class', 'username');
        usernameContainer.appendChild(usernameText);

        const introText = document.createTextNode(this.introText);

        const introContainer = document.createElement('span');
        introContainer.setAttribute('class', 'intro-text');
        introContainer.appendChild(introText);

        const lineElement = document.createElement('div');
        lineElement.setAttribute('class', 'owner');
        lineElement.setAttribute('id', this.id);

        lineElement.appendChild(usernameContainer);
        lineElement.appendChild(introContainer);

        return lineElement;

       // <div class="owner" id="{id}"><span class="username">{username}</span><span class="intro-text">{intro text}</span></div>
    }

    getHtmlElementForItemInList2() {

        const ownerData = `<span class="username">${this.username}</span><span class="intro-text">${this.introText}</span>`;

        const lineElement = document.createElement('div');
        lineElement.setAttribute('class', 'owner');
        lineElement.setAttribute('id', this.id);

        lineElement.innerHTML = ownerData;

        return lineElement;
    }

    getHtmlAsTextForItemInList() {
        return `<div class="owner" id="${this.id}"><span class="username">${this.username}</span><span class="intro-text">${this.introText}</span></div>`;
    }

}


const displayOwners = owners => {

    const ownersListContainer = document.getElementById('owners-container');
    ownersListContainer.innerHTML = '';

    owners.map(owner => new Owner(owner))
        .map(owner => owner.getHtmlElementForItemInList())
        .forEach(ownerElement => {
            ownersListContainer.appendChild(ownerElement);
        });
}

const displayOwners2 = owners => {

    document.getElementById('owners-container').innerHTML = owners.map(owner => new Owner(owner))
            .map(owner => owner.getHtmlAsTextForItemInList())
            .reduce((a, b) => a + b, '');
}

const loadOwners = () => {
    fetch('./owner.php')
        .then(response => response.json())
        .then(displayOwners);
}

document.getElementById('see-owners').addEventListener('click', loadOwners);



const sendPostRequest = (data) => {
    return fetch('./owner.php', {
        method: 'POST',
        body: JSON.stringify(data),
    })
    .then(response => response.json());
}

const sendPostRequestAsFormData = (data) => {

    let formData = new FormData();

    for (key in data) {
        formData.append(key, data[key]);
    }

    return fetch('./owner.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json());
}
