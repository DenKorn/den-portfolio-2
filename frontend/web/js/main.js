"use strict";

class Menu {
    constructor(menuItems) {
        this.currentPosition = 'home';
        this.items = {};
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

    goToHome() {
        if(this.currentPosition !== 'home'){

            this.currentPosition = 'home';
        }
    }

    goToAbout() {
        if(this.currentPosition !== 'about'){

            this.currentPosition = 'about';
        }
    }

    goToProjects() {
        if(this.currentPosition !== 'projects'){

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

    document.body.addEventListener('onclick', function () {

    });

    var mainMenu = new Menu({home : document.querySelector('#main-btn-home a'),
                             about : document.querySelector('#main-btn-about a'),
                             projects : document.querySelector('#main-btn-projects a'),
                             achievements : document.querySelector('#main-btn-achievements a'),
                             contact : document.querySelector('#main-btn-contact a')});
});


