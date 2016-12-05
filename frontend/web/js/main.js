"use strict";

const SITE_DOMAIN = "http://localhost/den-portfolio-2";
let mainMenu;

function XML2jsobj(node) {
    var	data = {};

    // append a value
    function Add(name, value) {
        if (data[name]) {
            if (data[name].constructor != Array) {
                data[name] = [data[name]];
            }
            data[name][data[name].length] = value;
        }
        else {
            data[name] = value;
        }
    };

    // element attributes
    var c, cn;
    for (c = 0; cn = node.attributes[c]; c++) {
        Add(cn.name, cn.value);
    }

    // child elements
    for (c = 0; cn = node.childNodes[c]; c++) {
        if (cn.nodeType == 1) {
            if (cn.childNodes.length == 1 && cn.firstChild.nodeType == 3) {
                // text value
                Add(cn.nodeName, cn.firstChild.nodeValue);
            }
            else {
                // sub-object
                Add(cn.nodeName, XML2jsobj(cn));
            }
        }
    }

    return data;
}

class Menu {
    constructor(menuItems, messagingInterface, outputContainer) {
        this.currentPosition = 'home';
        this.items = {};
        this.container = outputContainer;
        this.messaging = messagingInterface;
        for (let i in menuItems) {
            this.items[i] = {};
            this.items[i].element = menuItems[i];
            this.items[i].data = null;
        }
        !menuItems.home ? console.log('home item didn\'t found!') : menuItems.home.onclick = this.goToHome.bind(this);
        !menuItems.about ? console.log('about item didn\'t found!') : menuItems.about.onclick = this.goToAbout.bind(this);
        !menuItems.projects ? console.log('projects item didn\'t found!') : menuItems.projects.onclick = this.goToProjects.bind(this);
        !menuItems.achievements ? console.log('achievements item didn\'t found!') : menuItems.achievements.onclick = this.goToAchievements.bind(this);
        !menuItems.contact ? console.log('contact item didn\'t found!') : menuItems.contact.onclick = this.goToContact.bind(this);
    }

    clearContainer() {
        this.container.innerHTML = '';
    }

    postMessagesPage(from) {
        this.messaging.clearMessages();
        let counter = 0;
        for(let i in from) {
            this.messaging.pushMessage(from[i], counter++ * 500 + Math.random() * 2000);
        }
        this.clearContainer();
        this.messaging.initialize();
        this.messaging.animateMessages();
    }

    goToHome(loading = false) {
        if(this.currentPosition !== 'home' || loading){
            if(!this.items.home.data){
                let self = this;
                let xhr = new XMLHttpRequest();
                xhr.onload = (evt) => {
                    let xhr = evt.target;
                    self.items.home.data = XML2jsobj(xhr.responseXML.documentElement);
                    self.goToHome(true);
                };
                xhr.open('get', `${SITE_DOMAIN}/api`, true);
                xhr.send(null);
            } else {
                this.postMessagesPage(this.items.home.data);
            }
            this.currentPosition = 'home';
        }
    }

    goToAbout(loading = false) {
        if(this.currentPosition !== 'about' || loading){
            if(!this.items.about.data){
                let self = this;
                let xhr = new XMLHttpRequest();
                xhr.onload = (evt) => {
                    let xhr = evt.target;
                    self.items.about.data = XML2jsobj(xhr.responseXML.documentElement);
                    self.goToAbout(true);
                };
                xhr.open('get', `${SITE_DOMAIN}/api/get-about`, true);
                xhr.send(null);
            } else {
                this.postMessagesPage(this.items.about.data);
            }
            this.currentPosition = 'about';
        }
    }

    goToProjects() {
        if(this.currentPosition !== 'projects' || loading){
            if(!this.items.projects.data){
                let self = this;
                let xhr = new XMLHttpRequest();
                xhr.onload = (evt) => {
                    let xhr = evt.target;
                    self.items.projects.data = XML2jsobj(xhr.responseXML.documentElement);
                    self.goToProjects(true);
                };
                xhr.open('get', `${SITE_DOMAIN}/api/get-projects`, true);
                xhr.send(null);
            } else {
                this.postMessagesPage(this.items.projects.data);
            }
            this.currentPosition = 'projects';
        }
    }

    goToAchievements() {
        if(this.currentPosition !== 'achievements'){

            this.currentPosition = 'achievements';
        }
    }

    goToContact() {
        if(this.currentPosition !== 'contact'){

            this.currentPosition = 'contact';
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    let navBtns = document.querySelectorAll('#w1 li a');
    navBtns.forEach((el) => {
        el.addEventListener('click',(event) => {
            event.target.parentElement.classList.add('active');
            navBtns.forEach((btn) => {
                if(btn != el && btn.parentElement.classList.contains('active')) {
                    btn.parentElement.classList.remove('active');
                }
            });
        });
    });

    mainMenu = new Menu({home : document.querySelector('#main-btn-home a'),
            about : document.querySelector('#main-btn-about a'),
            projects : document.querySelector('#main-btn-projects a'),
            achievements : document.querySelector('#main-btn-achievements a'),
            contact : document.querySelector('#main-btn-contact a')},
        AniMessages, document.querySelector('#message   '));

    document.querySelector('#main-btn-home a').click();
});


