import {objectToFormData} from "../data/helpers/helpers";
import {max, min, minNumber, number, required, size} from "../data/validation/vuetify-validation";

class Product {
    constructor({id, title, cost, weight, statusName, sizes, img, description, createdAt, userName, isOriginal}) {
        this.id = id
        this.title = title
        this.cost = cost
        this.weight = weight
        this.statusName = statusName
        this.userName = userName
        this.sizes = sizes
        this.img = img
        this.isOriginal = isOriginal
        this.description = description
        this.createdAt = createdAt
    }

    static toFormData(productModel) {
        return objectToFormData(productModel);
    }

    static validationRules() {
        return {
            title: [required, min, max],
            cost: [required, number, minNumber],
            weight: [required, number, minNumber],
            sizes: [required, size],
            img: [],
            description: []
        }
    }

    static createNew() {
        return new Product({
            title: null,
            cost: 0,
            weight: 0,
            statusName: '',
            sizes: '0x0',
            img: null,
            description: '',
            createdAt: '',
        })
    }

    static transformCollection(data) {
        const temp = [];

        data.forEach((item) => {
            temp.push(new Product(item))
        })

        return temp;
    }
}

export default Product;




