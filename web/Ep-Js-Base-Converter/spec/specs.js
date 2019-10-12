describe('base convert', function() {
    it("convert 3 from decimal to binary and outputs 11", function () {
        expect(baseConvert(3,10,2)).to.equal('11');
    });

    it("convert 4 from decimal to ternary and outputs 11", function () {
        expect(baseConvert(4,10,3)).to.equal('11');
    });

    it("convert 17 from decimal to hexadecimal and outputs 11", function () {
        expect(baseConvert(17,10,16)).to.equal('11');
    });

    it("convert 1011 from binary to decimal and outputs 11", function () {
        expect(baseConvert(1011,2,10)).to.equal('11');
    });

    it("convert 102 from ternary to decimal and outputs 11", function () {
        expect(baseConvert(102,3,10)).to.equal('11');
    });

    it("convert b from hexadecimal to decimal and outputs 11", function () {
        expect(baseConvert('B','16','10')).to.equal('11');
    });
});
