from tkinter import *
from tkinter import filedialog as fDialog
import sys


def myHello():
    mLabel = Label(app,text='my rocking label',fg='red',bg='black').pack()

app = Tk() 
app.title("Hello World")
app.geometry('320x240+200+200')
myFN = fDialog.askopenfilename(filetypes = ( "text files", ".txt"))


# root = tkinter.Tk()
# root.withdraw()

# file_path = tkFileDialog.askopenfilename()

# mLabel = Label(text='testLabel1 you rock yo',fg='red',bg='black').grid(row=0,column=0,sticky=E)
# mLabel2 = Label(text='anotherLabel mutha',fg='red',bg='black').grid(row=1,column=0,sticky=E)
#mLabel3 = Label(text='anotherLabel mutha now is lablel',fg='red',bg='black').grid(row=1,column=1,sticky=E)
#mButton = Button(app,text="OK Mutha",command = myHello).pack()
# menubar = Menu(app)
# filemenu = Menu(menubar,tearoff=0)
# filemenu.add_command(label="test")
# filemenu.add_seperator()



app.mainloop()
