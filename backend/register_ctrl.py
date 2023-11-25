from schemas import InformationForm
from pymongo import MongoClient
from config import general_settings
import smtplib

def send_email(to_address):
    HOST_SERVER_MAIL = general_settings.HOST_MAILHOG
    PORT_SERVER_MAIL = general_settings.FORWARD_MAILHOG_PORT
    SENDER_EMAIL = general_settings.SENDER_EMAIL
    try:
        server = smtplib.SMTP(HOST_SERVER_MAIL, PORT_SERVER_MAIL)
        subject = "REGISTERED SUCCESSFULLY"
        body = "You have been registered successfully, please wait for the confirmation email."
        msg = f"Subject: {subject}\n\n{body}"
        server.sendmail(SENDER_EMAIL, to_address, msg)
        server.quit()
        return True
    except Exception as e:
        print("Error --> send_email",e)
        return False
    
def mongo_connect():
    USER = general_settings.MONGO_INITDB_ROOT_USERNAME
    PASS = general_settings.MONGO_INITDB_ROOT_PASSWORD
    HOST = general_settings.HOST_MONGO
    PORT = general_settings.PORT_MONGO
    DB_NAME = general_settings.DB_MONGO
    db_str = f'mongodb://{USER}:{PASS}@{HOST}:{PORT}/'
    try:
        client = MongoClient(db_str, maxPoolSize=200)
        db = client[DB_NAME]
        return db
    except Exception as e:
        print("Error --> mongo_connect",e)


def register_new_user(info: InformationForm):
    try:
        info_dict = info.dict()
        db = mongo_connect()
        if db is None:
            return False
        result = db['users'].insert_one(info_dict)
        if result.acknowledged:
            return send_email(info_dict['email'])
        else:
            return False
    except Exception as e:
        print("Error --> register_new_user",e)
        return False