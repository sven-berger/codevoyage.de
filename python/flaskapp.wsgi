import sys
import logging

sys.path.insert(0, '/var/customers/webs/svenberger/codevoyage.de/python')
from app import app as application
logging.basicConfig(stream=sys.stderr)
