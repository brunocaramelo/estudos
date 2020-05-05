import PersonInput from './inputs/person_input.js';
import Person from './../../models/Person.js';
import PersonObject from './../objects/person.js';

export default {
    type: PersonObject,
    args: {
        person: { type: PersonInput }
    },
    resolve: async (source, args) => {
        const person = await Person.create({ name: args.person.name });
        return person;
    }
}