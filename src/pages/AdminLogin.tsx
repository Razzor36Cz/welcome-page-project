import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { Lock } from 'lucide-react';
import { toast } from '@/hooks/use-toast';

const AdminLogin = () => {
  const [password, setPassword] = useState('');
  const { t } = useLanguage();
  const { login } = useAuth();
  const navigate = useNavigate();

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (login(password)) {
      toast({
        title: "Welcome back!",
        description: "Successfully logged in as admin",
      });
      navigate('/admin');
    } else {
      toast({
        title: "Error",
        description: "Invalid password",
        variant: "destructive",
      });
    }
  };

  return (
    <div className="min-h-screen bg-background flex items-center justify-center px-6">
      <div className="w-full max-w-md">
        <div className="aluminum-surface rounded-2xl p-8 md:p-12 animate-scale-in">
          {/* Icon */}
          <div className="flex justify-center mb-8">
            <div className="w-20 h-20 rounded-full bg-aluminum/10 flex items-center justify-center border border-aluminum/20">
              <Lock className="w-8 h-8 text-aluminum" />
            </div>
          </div>

          {/* Title */}
          <h1 className="font-display text-2xl text-center aluminum-text mb-8">
            {t('adminLogin')}
          </h1>

          {/* Form */}
          <form onSubmit={handleSubmit} className="space-y-6">
            <div>
              <label className="block text-sm text-muted-foreground mb-2">
                {t('password')}
              </label>
              <Input
                type="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                className="bg-background border-aluminum/20 focus:border-aluminum/40"
                placeholder="••••••••"
              />
            </div>

            <Button
              type="submit"
              variant="luxury"
              className="w-full"
              size="lg"
            >
              {t('login')}
            </Button>
          </form>

          {/* Back Link */}
          <button
            onClick={() => navigate('/home')}
            className="block w-full text-center mt-6 text-muted-foreground hover:text-foreground text-sm transition-colors"
          >
            ← Back to portfolio
          </button>
        </div>
      </div>
    </div>
  );
};

export default AdminLogin;
