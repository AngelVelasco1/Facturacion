/* Bootstrap styles */
import styles from 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' assert {type: 'css'};
/* Export class */
export class Body extends HTMLElement {
    constructor() {
        super();
        document.adoptedStyleSheets.push(styles);
    }

    async components() {
        return await (await fetch('components/my-body.html')).text();
    }
    selection(e) {
        let target = e.target;

        if(target.nodeName == 'BUTTON') {
            let eachBox = e.target.parentNode.parentNode;
            let allInputs = eachBox.querySelectorAll(`input`);

            switch(target.innerHTML) {
                case "-":
                    allInputs.forEach(e => {
                        (e.name == "amount" && e.value == 0) ? eachBox.parentNode.remove() : (e.name == "amount") ? e.value-- : e.value; 
                    })
                    break;
                case "+":
                    allInputs.forEach(e => {
                        (e.name == "amount") ? e.value++ : undefined;
                    })
                    break;

            }
        }
    }
    connectedCallback() {
        this.components().then(html => {
            this.innerHTML = html;
            this.container = this.querySelector('#products');
            this.container.addEventListener('click', this.selection);
        })
        
    }
}
customElements.define('my-body', Body);