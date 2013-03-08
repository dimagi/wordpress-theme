from fabric.api import *
from fabric.contrib import console
from fabric import utils

env.code_repo = 'https://github.com/dimagi/wordpress-theme.git'
env.code_branch = 'master'
env.root = root = '/home/content/d/i/m/dimagi'
env.repo_root = repo = _join(root, 'sites/wordpress-theme')
env.repo_theme = _join(repo, 'dimagi-4')
theme = _join(root, 'html/wp/wp-content/themes')
env.sudo_user = 'dimagi'
env.hosts = ['dimagi.com']
env.environment = 'production'


def _join(*args):
    """
    We're deploying on Linux, so hard-code that path separator here.
    """
    return '/'.join(args)


def production():
    """ use production environment on dimagi.com"""
    env.theme_root = _join(theme, 'dimagi-4')
    env.user = prompt("Username: ", default=env.user)
    
    
def staging():
    """ use staging environment on dimagi.com"""
    env.theme_root = _join(theme, 'dimagi-beta')
    env.environment = 'staging'
    env.code_branch = 'staging'
    env.user = prompt("Username: ", default=env.user)


def deploy():
    """ Deploy to remote host. """
    require('root', provided_by=(env.environment))
    if env.environment == 'production':
        if not console.confirm('Are you sure you want to deploy from github to production?', default=False):
            utils.abort('Production deployment aborted.')

    with cd(env.repo_root):
      sudo('git checkout %(code_branch)s' % env, user=env.sudo_user)
      sudo('git pull --rebase origin %(code_branch)s' % env, user=env.sudo_user)
      sudo('rm -r %(theme_root)s' % env, user=env.sudo_user)
      sudo('cp -r %(repo_theme)s %(theme_root)s' % env, user=env.sudo_user)