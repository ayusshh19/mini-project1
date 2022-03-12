from flask import Flask, render_template,request,session
from flask_sqlalchemy import SQLAlchemy
from flask_mail import Mail
from random import *
import mysql.connector
import re

from sqlalchemy import false
# DATABASE CONNECTION
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="pythonproject"
)
# APP CONNECTOR
app = Flask(__name__)
# MAIL CONNECTOR
app.config.update(
    MAIL_SERVER = 'smtp.gmail.com',
    MAIL_PORT = '465',
    MAIL_USE_SSL = True,
    MAIL_USERNAME = 'cm.b.49ayush.shukla@gmail.com',
    MAIL_PASSWORD = 'ayusshh19'
)
app.secret_key = b'_5#y2L"F4Q8z\n\xec]/'
mycursor = mydb.cursor()
mail = Mail(app)
# FOR OTP
otp=randint(1000,9999)
# CONTACT US FORM
@app.route("/",methods = ['GET', 'POST'])
def hello():
    if(request.method=='POST'):
        '''Add entry to the database'''
        fname1 = request.form.get('fname')
        lname1 = request.form.get('lname')
        email1 = request.form.get('email')
        sub1= request.form.get('subject')
        message1 = request.form.get('message')
        sql = "INSERT INTO contact (first, last,email,subject,message) VALUES (%s, %s,%s,%s,%s)"
        val = (fname1, lname1,email1,sub1,message1)
        mycursor.execute(sql, val)

        mydb.commit()

        mail.send_message('New message from {}'.format(fname1),
    sender = email1,
    recipients = ["cm.b.49ayush.shukla@gmail.com"],
    body = message1,
    )
    return render_template('index.html')
# REGISTER FORM
@app.route("/register")
def register():
    return render_template("register.php",errormessage=False)
# LOGIN FORM
@app.route("/login",methods = ['GET', 'POST'])
def login():
    return render_template("login.html")
# AFTER LOG IN SUBMIT
@app.route("/loginfetch",methods = ['GET', 'POST'])
def loginfetch():
    if(request.method=='POST'):
        email1 = request.form.get('email')
        pass1 = request.form.get('pass')
        sql = f"SELECT username FROM registration WHERE email='{email1}' and password1='{pass1}'"
        mycursor.execute(sql)
        myresult = mycursor.fetchall()
        if len(myresult)>0:
            session['name']=myresult
            return render_template("jackport.html",name=session['name'][0])
        else:
            return render_template("login.html")
list_register=[]
# AFTER OTP SUBMIT
@app.route("/otp",methods = ['GET', 'POST'])
def verify_otp():
    if(request.method=='POST'):
        '''Add entry to the database'''
        in1 = request.form.get('input1')
        in2 = request.form.get('input2')
        in3 = request.form.get('input3')
        in4 = request.form.get('input4')
        otp_user=int(in1+in2+in3+in4)
        if otp==otp_user:
            sql = "INSERT INTO registration (username,email,password1) VALUES (%s, %s,%s)"
            val = (list_register[0][1], list_register[0][0],list_register[0][2])
            mycursor.execute(sql, val)
            mydb.commit()
            list_register.clear()
            return render_template("quiz.html")
        else:
            return render_template("register.php")
            
# AFTER REGISTRATION SUBMIT
@app.route("/registration",methods = ['GET', 'POST'])
def sigup():
    email1 = request.form.get('email')
    user1 = request.form.get('username')
    pass1 = request.form.get('pass')
    repass1 = request.form.get('repass')
    x = re.search("[A-Z][a-z]{4}[0-9]{3}", user1)
    y = re.search('[A-Z][a-z].+[0-9].+', pass1)
    z = re.search('[cm]{2}\.[ab]+\.[0-9].[A-Za-z.].+\@', email1)
    if x:
        errormessage=False
    else:
        errormessage=True
    if y:
        errorpass=False
    else:
        errorpass=True
    if z:
        erroremail=False
    else:
        erroremail=True
    if pass1==repass1 and errorpass==False and erroremail==False and errormessage==False:    
        list_register.append([email1,user1,pass1])
        mail.send_message('Your OTP:',
        sender = "cm.b.49ayush.shukla@gmail.com",
        recipients = [email1],
        body = "Your OTP is {}".format(otp),
        )
        return render_template("otp.html",email=email1)
    else:
        errorobj={
            "erroremail":erroremail,
            "errormessage":errormessage,
            "errorpass":errorpass}
        
        return render_template("register.php",errormessage=True)
# AFTER QUIZ FORM SUBMIT
@app.route("/quiz",methods = ['GET', 'POST'])
def quiz():
    if(request.method=='POST'):
        nature=request.form.get("nature")
        mess=request.form.get("mess")
        friends=request.form.get("friends")
        type=request.form.get("type")
        user=session['name'][0][0]
        print(mess,friends,type,user)
        sql = "INSERT INTO personal_quality(username,nature,mess,friends,type) VALUES (%s,%s,%s,%s,%s)"
        val = (user,nature,mess,friends,type)
        mycursor.execute(sql, val)
        mydb.commit()
        return render_template("jackport.html",name=user)
    
    
app.run(debug=True)