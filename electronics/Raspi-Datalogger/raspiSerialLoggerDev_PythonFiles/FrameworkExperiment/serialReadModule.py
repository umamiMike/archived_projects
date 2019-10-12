class serialReadModule:
    serial = __import__('serial')

    def __init__(self,data):
        self.data = data

    def doNothing(self):
        print("do Nothing")
