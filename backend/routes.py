from __future__ import annotations
from register_ctrl import register_new_user
from schemas import InformationForm
from fastapi import APIRouter
router = APIRouter()

@router.post("/register")
async def post_register(info: InformationForm):
    try:
        resp = register_new_user(info)
        return {"status": resp}
    except Exception as e:
        print(e)
        return {"message": "error"}