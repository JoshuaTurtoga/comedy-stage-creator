import { Button } from "@/components/ui/button";
import heroImage from "@/assets/hero-comedian.jpg";

const Hero = () => {
  return (
    <section className="relative min-h-screen flex items-center justify-center overflow-hidden">
      {/* Background Image */}
      <div className="absolute inset-0">
        <img
          src={heroImage}
          alt="Mike Collins performing on stage"
          className="w-full h-full object-cover object-center"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-background via-background/70 to-background/30" />
      </div>

      {/* Spotlight Effect */}
      <div className="absolute inset-0 spotlight" />

      {/* Content */}
      <div className="relative z-10 container mx-auto px-4 text-center pt-20">
        <p 
          className="text-primary font-medium tracking-widest uppercase mb-4 opacity-0 animate-fade-in"
          style={{ animationDelay: "0.2s" }}
        >
          Stand-Up Comedian
        </p>
        <h1 
          className="font-display text-7xl md:text-9xl lg:text-[12rem] text-foreground leading-none mb-6 text-glow opacity-0 animate-fade-in"
          style={{ animationDelay: "0.4s" }}
        >
          MIKE COLLINS
        </h1>
        <p 
          className="text-xl md:text-2xl text-muted-foreground max-w-2xl mx-auto mb-10 opacity-0 animate-fade-in"
          style={{ animationDelay: "0.6s" }}
        >
          Making audiences laugh across the nation with sharp wit and unforgettable stories
        </p>
        <div 
          className="flex flex-col sm:flex-row gap-4 justify-center opacity-0 animate-fade-in"
          style={{ animationDelay: "0.8s" }}
        >
          <Button variant="hero">
            Get Tickets
          </Button>
          <Button variant="heroOutline">
            Watch Clips
          </Button>
        </div>
      </div>

      {/* Scroll Indicator */}
      <div className="absolute bottom-10 left-1/2 -translate-x-1/2 opacity-0 animate-fade-in" style={{ animationDelay: "1.2s" }}>
        <div className="w-6 h-10 border-2 border-foreground/30 rounded-full flex justify-center pt-2">
          <div className="w-1.5 h-3 bg-primary rounded-full animate-bounce" />
        </div>
      </div>
    </section>
  );
};

export default Hero;
