/* Bootstrap styles */
import styles from 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' assert {type: 'css'}
/* Add export class */
export class Header extends HTMLElement {
    constructor() {
        super();
    }

    async components() {
        return await (await fetch('components/my-header.html')).text();
    }

    connectedCallback() {
        document.adoptedStyleSheets.push(styles);
        this.components().then(html => {
            this.innerHTML = html
        })
    } 
}
customElements.define('my-header', Header);
