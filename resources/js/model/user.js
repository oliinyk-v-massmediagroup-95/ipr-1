
class User {
    constructor({id, name, role, email, createdAt}) {
        this.id = id
        this.name = name
        this.role = role
        this.email = email
        this.createdAt = createdAt
    }
    static createNew() {
        return new User({})
    }

    static transformCollection(data) {
        const temp = [];

        data.forEach((item) => {
            temp.push(new User(item))
        })

        return temp;
    }
}

export default User;




