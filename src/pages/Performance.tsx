import { useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '@/contexts/AuthContext';
import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { Users, Eye, TrendingUp, Music, Video, Calendar, Clock, BarChart3 } from 'lucide-react';

const Performance = () => {
  const { isAdmin } = useAuth();
  const navigate = useNavigate();
  const { t } = useLanguage();

  useEffect(() => {
    if (!isAdmin) {
      navigate('/admin-login');
    }
  }, [isAdmin, navigate]);

  if (!isAdmin) return null;

  // Placeholder data - would need backend/database integration for real data
  const stats = {
    last24h: 42,
    lastDay: 42,
    lastWeek: 287,
    lastMonth: 1234,
    allTime: 8567,
    mostPlayedSong: {
      title: 'Track Name',
      plays: 156
    },
    mostPlayedVideo: {
      title: 'Video Title',
      plays: 89
    }
  };

  const statCards = [
    { label: 'Last 24 Hours', value: stats.last24h, icon: Clock, color: 'from-blue-500/20 to-blue-600/10' },
    { label: 'Last Day', value: stats.lastDay, icon: Calendar, color: 'from-green-500/20 to-green-600/10' },
    { label: 'Last Week', value: stats.lastWeek, icon: TrendingUp, color: 'from-purple-500/20 to-purple-600/10' },
    { label: 'Last Month', value: stats.lastMonth, icon: BarChart3, color: 'from-orange-500/20 to-orange-600/10' },
    { label: 'All Time', value: stats.allTime, icon: Users, color: 'from-pink-500/20 to-pink-600/10' },
  ];

  return (
    <div className="min-h-screen bg-background relative">
      <Navigation />
      
      <main className="pt-32 pb-24 px-6">
        <div className="container mx-auto max-w-6xl">
          <div className="text-center mb-12 animate-fade-in-up">
            <h1 className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('performance')}
            </h1>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto mb-4" />
            <p className="text-muted-foreground font-light">
              Website Analytics & Statistics
            </p>
          </div>

          {/* Visitor Stats Grid */}
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-12">
            {statCards.map(({ label, value, icon: Icon, color }, index) => (
              <div
                key={label}
                className={`aluminum-surface bg-gradient-to-br ${color} rounded-xl p-6 text-center transition-all duration-300 hover:scale-105 animate-fade-in`}
                style={{ animationDelay: `${index * 0.1}s` }}
              >
                <Icon className="w-8 h-8 mx-auto mb-3 text-aluminum" strokeWidth={1.5} />
                <p className="text-3xl font-display text-foreground mb-1">{value.toLocaleString()}</p>
                <p className="text-sm text-muted-foreground font-light">{label}</p>
              </div>
            ))}
          </div>

          {/* Most Played Content */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {/* Most Played Song */}
            <div className="aluminum-surface rounded-xl p-8 animate-fade-in">
              <div className="flex items-center gap-4 mb-6">
                <div className="w-12 h-12 rounded-full bg-aluminum/10 flex items-center justify-center">
                  <Music className="w-6 h-6 text-aluminum" strokeWidth={1.5} />
                </div>
                <h2 className="font-display text-xl text-foreground">
                  Most Played Song
                </h2>
              </div>
              <div className="space-y-2">
                <p className="text-2xl font-display text-foreground">{stats.mostPlayedSong.title}</p>
                <p className="text-muted-foreground flex items-center gap-2">
                  <Eye size={16} />
                  {stats.mostPlayedSong.plays} plays
                </p>
              </div>
            </div>

            {/* Most Played Video */}
            <div className="aluminum-surface rounded-xl p-8 animate-fade-in" style={{ animationDelay: '0.1s' }}>
              <div className="flex items-center gap-4 mb-6">
                <div className="w-12 h-12 rounded-full bg-aluminum/10 flex items-center justify-center">
                  <Video className="w-6 h-6 text-aluminum" strokeWidth={1.5} />
                </div>
                <h2 className="font-display text-xl text-foreground">
                  Most Played Video
                </h2>
              </div>
              <div className="space-y-2">
                <p className="text-2xl font-display text-foreground">{stats.mostPlayedVideo.title}</p>
                <p className="text-muted-foreground flex items-center gap-2">
                  <Eye size={16} />
                  {stats.mostPlayedVideo.plays} plays
                </p>
              </div>
            </div>
          </div>

          {/* Note about backend */}
          <div className="mt-8 p-4 aluminum-surface rounded-lg text-center">
            <p className="text-sm text-muted-foreground font-light">
              Note: Real-time analytics require backend database integration. Currently showing placeholder data.
            </p>
          </div>
        </div>
      </main>
    </div>
  );
};

export default Performance;
