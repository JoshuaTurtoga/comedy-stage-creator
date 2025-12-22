import { Play } from "lucide-react";

const videos = [
  {
    title: "Life's Too Short - Full Special",
    views: "12M views",
    thumbnail: "Special",
  },
  {
    title: "Best of Late Night Appearances",
    views: "5.2M views",
    thumbnail: "Late Night",
  },
  {
    title: "Relationship Comedy Gold",
    views: "8.7M views",
    thumbnail: "Clips",
  },
];

const Videos = () => {
  return (
    <section id="videos" className="py-24 bg-card">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="font-display text-5xl md:text-6xl text-foreground mb-4">
            WATCH <span className="text-primary">MIKE</span>
          </h2>
          <p className="text-muted-foreground max-w-xl mx-auto">
            Catch up on the latest clips and full specials
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
          {videos.map((video, index) => (
            <div
              key={index}
              className="group cursor-pointer"
            >
              <div className="relative aspect-video bg-secondary rounded-lg overflow-hidden mb-4 glow-box group-hover:glow-box-strong transition-all duration-300">
                <div className="w-full h-full bg-gradient-to-br from-muted to-secondary flex items-center justify-center">
                  <span className="font-display text-2xl text-muted-foreground/30">
                    {video.thumbnail}
                  </span>
                </div>
                <div className="absolute inset-0 bg-background/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                  <div className="w-16 h-16 bg-primary rounded-full flex items-center justify-center animate-pulse-glow">
                    <Play size={28} className="text-primary-foreground ml-1" />
                  </div>
                </div>
              </div>
              <h3 className="font-semibold text-foreground group-hover:text-primary transition-colors">
                {video.title}
              </h3>
              <p className="text-muted-foreground text-sm">{video.views}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Videos;
