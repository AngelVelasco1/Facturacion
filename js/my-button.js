/* Bootstrap styles */
import styles from 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' assert {type: 'css'};
/* Export class */
export class Button extends HTMLElement {
    constructor() {
        super();
    }

    async components() {
        return await (await fetch('components/my-button.html')).text();
    }

    async connectedCallback() {
        document.adoptedStyleSheets.push(styles);
        await this.render();
        this.addBtn.addEventListener('click', this.handleClick.bind(this))

    } 

    async render() {
        let component = await this.components();
        this.innerHTML = component;

        this.products = this.querySelector('#products_container');
        this.addBtn = this.querySelector('#add_btn');
    }

    handleClick() {
        let newProduct = document.createElement('my-body');
        this.products.insertAdjacentHTML('afterbegin', newProduct.outerHTML);
    }
 }
customElements.define('my-button', Button);