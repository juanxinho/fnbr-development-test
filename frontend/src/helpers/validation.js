export const Validation = (values) => {
    const validateInputs = () => {
        let errors = {};

        if(!values.area){
            errors.area="Area is required"
        }

        if (!values.name) {
            errors.name = 'Name is required';
        }

        if (!values.email) {
            errors.email = 'Email is required';
        }

        if (!values.country) {
            errors.country = 'Country is required';
        }

        if (!values.city) {
            errors.city = 'City is required';
        }

        if (!values.program) {
            errors.program = 'Program is required';
        }

        if (!values.lastnames) {
            errors.lastnames = 'Last names is required';
        }

        if (!values.phone) {
            errors.phone = 'Phones is required';
        }

        if (!values.state) {
            errors.state = 'State is required';
        }

        if(!values.terms){
            errors.terms= "You must agree to the terms and conditions"
        }

    

        return errors;
    };

    return validateInputs;
};
