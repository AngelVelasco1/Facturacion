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
            let allInputs = document.querySelectorAll(`#${$dataset.row} input`);

            switch(target) {
                case "-":
                    allInputs.forEach(e => {
                        
                    })

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