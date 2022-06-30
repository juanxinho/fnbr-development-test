import { extend, localize } from "vee-validate";
import {
    required as rule_required,
    email as rule_email,
    min as rule_min,
    confirmed as rule_confirmed,
    regex as rule_regex,
    between as rule_between,
    alpha as rule_alpha,
    integer as rule_integer,
    digits as rule_digits,
    alpha_dash as rule_alpha_dash,
    alpha_num as rule_alpha_num,
    length as rule_length,
} from "vee-validate/dist/rules";
import en from "vee-validate/dist/locale/en.json";

// ////////////////////////////////////////////////////////
// General
// ////////////////////////////////////////////////////////

export const required = extend("required", rule_required);

export const email = extend("email", rule_email);

export const min = extend("min", rule_min);

export const confirmed = extend("confirmed", rule_confirmed);

export const regex = extend("regex", rule_regex);

export const between = extend("between", rule_between);

export const alpha = extend("alpha", rule_alpha);

export const integer = extend("integer", rule_integer);

export const digits = extend("digits", rule_digits);

export const alphaDash = extend("alpha-dash", rule_alpha_dash);

export const alphaNum = extend("alpha-num", rule_alpha_num);

export const length = extend("length", rule_length);

localize({
    en: {
        messages: en.messages,
        names: {
            email: 'Email',
            password: 'Password',
        },
        fields: {
            password: {
                min: '{_field_} is too short, you want to get hacked?',
            },
        },
    },

});

localize("es", en);

