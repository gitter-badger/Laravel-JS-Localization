'use strict';

var util = require('util');
var Lang = new(require('../../js/lang.js'))();
var messages = require('./data/messages');

Lang.setMessages(messages);

describe('The Lang.get() method', function() {

    it('should exists', function() {
        expect(Lang.get).toBeDefined();
    });

    it('should be a function', function() {
        expect(typeof Lang.get).toBe('function');
    });

    it('should return the passed key when not found', function() {
        expect(Lang.get('foo.bar')).toBe('foo.bar');
        expect(Lang.get(null)).toBe(null);
    });

    it('should return the expected message', function() {
        expect(Lang.get('messages.home')).toBe('Home');
    });

    it('should return the expected message with replacements', function() {
        expect(Lang.get('validation.accepted')).toBe('The :attribute must be accepted.');
        expect(Lang.get('validation.accepted', {
            'attribute': 'foo'
        })).toBe('The foo must be accepted.');
    });

});